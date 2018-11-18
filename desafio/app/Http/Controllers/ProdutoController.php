<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    public function lista(){
        $produtos = Produto::all();
        return view('adicionar_pedido')->with('produtos', $produtos);
    }
}
