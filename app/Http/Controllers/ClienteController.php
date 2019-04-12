<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClienteController extends Controller {

    public function salvarCliente(Request $request) {
        $dbCliente = new Clientes();
        
        $dbCliente->nome            = $request->input("txtNome");
        $dbCliente->email           = $request->input("txtEmail");
        $dbCliente->telefone        = $request->input("txtTelefone");
        $dbCliente->save();
        
        return json_encode(array("retorno" => "sucesso"));
    }
}
