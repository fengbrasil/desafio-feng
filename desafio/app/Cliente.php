<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    
    protected $fillable = ['id', 'nome', 'email', 'telefone'];

    public function pedido(){
        return $this->hasMany('App\Pedido', 'cliente_id');
    }

}
