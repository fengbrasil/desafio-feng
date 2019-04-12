<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedidos extends Model {
    protected $table = "pedido";
    
    public function clientes(){
        return $this->belongsTo("App\Clientes", "cliente_id", "id");
    }
    
    public function item(){
        return $this->belongsToMany("App\Item", "pedido_item", "pedido_id", "item_id");
    }
    
    public function getPedidos($request) {
        DB::statement(DB::raw('set @linha = 0'));
        $bdPedidos = DB::table("pedido")
                                ->join("clientes", "pedido.cliente_id", "=", "clientes.id")
                
                                ->select(   "pedido.id", 
                                            "pedido.created_at", 
                                            "pedido.valor",
                                            "clientes.nome", 
                                            DB::raw('@linha := @linha  + 1 AS rnum') )
                
                                ->orderBy("pedido.id", "asc")
                                ->offset($request->input("start"))
                                ->limit($request->input("length"))
                                ->get();
        
        return $bdPedidos;
    }
}
