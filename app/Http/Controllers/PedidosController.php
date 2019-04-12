<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Pedidos;
use App\Item;

class PedidosController extends Controller {

    public function salvarPedido(Request $request) {
        $bdPedido = Pedidos::find($request->input("hdnNumeroPedido"));
        
        if(isset($bdPedido)){
            try {
                $bdPedido->item()->attach($request->input("selItem"));
                
                $bdItem = Item::find($request->input("selItem"));
                $bdPedido->valor += $bdItem->valor;
                $bdPedido->save();
            } catch (QueryException $exc) {
                return json_encode(array("pedido" => "ERRO: Item já inserido"));
            }
        } else {
            $bdPedido = new Pedidos();
            $bdItem = Item::find($request->input("selItem"));
        
            $bdPedido->cliente_id = $request->input("selCliente");
            $bdPedido->valor = $bdItem->valor;
            $bdPedido->save();
            
            $bdPedidoItem = Pedidos::find($bdPedido->id);

            $bdPedidoItem->item()->attach($request->input("selItem"));
        }
        
        return json_encode(array("pedido" => $bdPedido->id));
    }
    
    public function getPedidos(Request $request) {
        $bdPedidos = new Pedidos();
        
        $result = $bdPedidos->getPedidos($request);
        foreach ($result as $key => $value) {
            $result[$key] = array_values(get_object_vars($value));
        }
        
        
        $data = array();
        $data = array($request->input('draw'),
                      "recordsTotal" => count($result),
                      "recordsFiltered" => count($result),
                      "data" => $result);
        
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
