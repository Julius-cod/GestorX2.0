<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
   protected $fillable = ['produto_id', 'tipo', 'quantidade', 'user_id'];

   public function produto()
   {
    return $this->belongsTo(Produto::class);
   }

   public function usuario()
   {
     return $this->belongsTo(User::class, 'user_id');
   }

}
