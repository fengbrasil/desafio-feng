<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Auth;
use App\Pedido;
use App\Produto;
use App\Cliente;

class PedidoController extends Controller{

    public function lista(){
        if(Auth::check()){
            $usuario = Auth::user();
            $pedidos = Pedido::all();
            foreach($pedidos as $key=>$pedido){
                $clientes[$key] = Cliente::find($pedido['cliente_id']);    
            }
            return view('pedidos')
            ->with('pedidos', $pedidos)
            ->with('usuario', $usuario)
            ->with('clientes', $clientes);
        }else{
            return redirect('login');
        }
    }

    public function inserir_pedido(){  
        $cliente_id  = Request::input('cliente_id');
        $produtos_id = Request::input('produto_id');
        $data        = Request::input('data');
        $produto     = [];
        $valor       = 0;

        for($i=0; $i < count($produtos_id); $i++){
            $produto[$i] = Produto::find($produtos_id[$i]);
            $valor = $valor + $produto[$i]['valor_unitario'];
        }

        $pedido = new Pedido();  
        $pedido->cliente_id = $cliente_id;
        $pedido->data = $data;
        $pedido->valor = $valor;
        $pedido->save();

        for($i=0; $i < count($produtos_id); $i++){
            $pedido_id = Pedido::find($pedido->id);
            $pedido->produto()->attach($produtos_id[$i]);
        }

        return redirect('pedidos');

    }

    public function form_adicionar(){
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('adicionar_pedido')
        ->with('clientes', $clientes)
        ->with('produtos', $produtos);
    }

    public function mostra(){
        $id      = Request::route('id');
        $pedido  = Pedido::find($id);
        $cliente = $pedido->cliente;
        $produtos = [];
        $total = 0;

        foreach ($pedido->produto as $produto){
            $produto->pivot->produto_id;
        }

        $pedido_produto = DB::table('pedido_produto')->where('pedido_id', '=', $id)->get();

        for($i=0;$i<count($pedido_produto);$i++){
            $produtos[$i] = Produto::find($pedido_produto[$i]->produto_id);
            $total = $total + $produtos[$i]['valor_unitario'];
        }

        return view('mostra_pedido')
            ->with('cliente', $cliente)
            ->with('pedido', $pedido)
            ->with('produtos', $produtos)
            ->with('total', $total);
    }    
}
