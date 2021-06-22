<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;

class ClientesController extends Controller
{
    public function index(){
       
        $clientes = cliente::orderby('id', 'desc')->paginate('99999');
        
        return view('clientes.index', ['clientes' => $clientes]);
        
        
    }


    public function create(){

        return view('clientes.create');
    }


    public function insert(Request $Request){
        $cliente = new cliente();
        
        $cliente->CLI_NOME = $Request->CLI_NOME;
        $cliente->CLI_RG = $Request->CLI_RG;
        $cliente->CLI_CPF = $Request->CLI_CPF;
        $cliente->CLI_RUA = $Request->CLI_RUA;
        $cliente->CLI_CEP = $Request->CLI_CEP;
        $cliente->CLI_BAIRRO = $Request->CLI_BAIRRO;
        $cliente->CLI_CIDADE = $Request->CLI_CIDADE;
        $cliente->CLI_ESTADO = $Request->CLI_ESTADO;
        $cliente->CLI_NUMERO = $Request->CLI_NUMERO;
        $cliente->CLI_COMPLEMENTO = $Request->CLI_COMPLEMENTO;
        
        $cliente->save();

       
        
        return redirect()->route('clientes');

    }


    public function show($id){
        $cliente = cliente::find($id);

        return view('clientes.show', ['cliente' => $cliente]);
    }

    public function edit(cliente $cliente){
       
        return view('clientes.edit', ['cliente' => $cliente]);   
     }

     

     public function editar(Request $Request, cliente $cliente){
        
        $cliente->CLI_NOME = $Request->CLI_NOME;
        $cliente->CLI_RG = $Request->CLI_RG;
        $cliente->CLI_CPF = $Request->CLI_CPF;
        $cliente->CLI_RUA = $Request->CLI_RUA;
        $cliente->CLI_CEP = $Request->CLI_CEP;
        $cliente->CLI_BAIRRO = $Request->CLI_BAIRRO;
        $cliente->CLI_CIDADE = $Request->CLI_CIDADE;
        $cliente->CLI_ESTADO = $Request->CLI_ESTADO;
        $cliente->CLI_NUMERO = $Request->CLI_NUMERO;
        $cliente->CLI_COMPLEMENTO = $Request->CLI_COMPLEMENTO;

        $cliente->save();
        return redirect()->route('clientes');

    }

    
    public function delete(cliente $cliente){
        $cliente->delete();
        //$equipe->delete();
        return redirect()->route('clientes');
     }

     public function modal($id){
        $clientes = cliente::orderby('id', 'desc')->paginate('99999');
        
        return view('clientes.index', ['clientes' => $clientes, 'id' => $id]);

     }

}

