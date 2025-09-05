<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{
    //Listar + Numeros (total de produtos, estoque total)
    public function index()
    {
        $totalProdutos = Produto::count();
        $estoqueTotal = Produto::sum('quantidade');
        $produtos = Produto::with('categoria')->orderBy('id', 'desc')->get();

        return view('produtos.index', compact('produtos', 'totalProdutos', 'estoqueTotal' ));

    }

    //Formularo de criacao
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    //Salvar no banco de dados ('volt17') kkkk
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'categoria_id' => 'nullable|exists:categorias,id',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|max:2048',
        ]);

        if($request->hasFile('imagem')){
            //armazena em storage/app/public/produtos
            $path = $request->file('imagem')->store('produtos', 'public');
            $data['imagem'] = $path;
        }

        Produto::create($data);

        return redirect()->route('produtos.index')->with('sucess', 'Produto criado.');
    }

    //MOATRAR LISTA DE PRODUTOS
    public function show($id)
    {
        $produto = Produto::with('categoria')->findOrFail($id);
        return view('produtos.show', compact('produto'));
    }

    //Formulario de edicao
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    // ATUALIZAR 
      public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'categoria_id' => 'nullable|exists:categorias,id',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|max:2048',
        ]);

        if($request->hasFile('imagem')){
            //apaga a imagem antiga se existir
            if($produto->imagem){
                Storage::disk('public')->delete($produto->imagem);
            }
            $path = $request->file('imagem')->store('produtos', 'public');
            $data['imagem'] = $path;
        }
        $produto->update($data);

        return redirect()->route('produtos.index')->with('sucess', 'produto atualizado');

    }

    //DELETAR PRODUTOS

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído.');
    }





}
