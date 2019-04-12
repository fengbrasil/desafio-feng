<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller {

    public function salvarItem(Request $request) {
        $dbItem = new Item();

        $dbItem->nome = $request->input("txtNome");
        $dbItem->descricao = $request->input("txtDescricao");
        $dbItem->valor = $request->input("txtValor");
        $dbItem->save();

        return json_encode(array("retorno" => "sucesso"));
    }
}
