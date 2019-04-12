<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model {
    protected $table = "pedidos";
    
    public function clientes(){
        return $this->belongsTo("App\Clientes", "cliente_id", "id");
    }
    
    public function item(){
        return $this->belongsTo("App\Item", "item_id", "id");
    }
}
