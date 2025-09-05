<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
   protected $fillable = ['nome', 'descricao', 'categoria_id', 'quantidade', 'preco', 'imagem'];

   public function categoria()
   {
        return $this->belongsTo(Categoria::class, 'categoria_id');
   }
   public function movimentacoes()
   {
      return $this->hasMany(Movimentacao::class);
   }
}
