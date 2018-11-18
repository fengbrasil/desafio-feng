<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['id', 'data', 'valor', 'cliente_id'];

    public function cliente(){
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }

    public function produto(){
        return $this->belongsToMany('App\Produto', 'pedido_produto')
        ->withPivot('produto_id', 'pedido_id');
    }
}
