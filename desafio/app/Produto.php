<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['id', 'nome', 'descricao', 'valor_unitario'];

    public function pedido(){
        return $this->belongsToMany('App\Pedido', 'pedido_produto')
                    ->withPivot('produto_id', 'pedido_id', 'quantidade');
    }
}
