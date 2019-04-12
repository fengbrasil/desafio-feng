<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {
    protected $table = "clientes";
    
    public function pedidos(){
        return $this->hasOne("App\Pedidos", "cliente_id", "id");
    }
}
