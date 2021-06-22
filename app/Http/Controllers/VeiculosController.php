<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\veiculo;

class VeiculosController extends Controller
{
    public function index(){
       $veiculos = veiculo::paginate('99999');
       return view('veiculos.index', ['veiculos'=> $veiculos]) ;
       
    }


    public function create(){
        return view('veiculos.create');
    }

    public function insert(Request $Request){
        $veiculo = new veiculo();

        $veiculo->nome = $Request->nome;
        $veiculo->marca = $Request->marca;
        $veiculo->cor = $Request->cor;
        $veiculo->ano = $Request->ano;
        $veiculo->placa = $Request->placa;

        $veiculo->save();
        return redirect()->route('veiculos');

    }


    public function show($id){
        $veiculo = veiculo::find($id);
        return view('veiculos.show', ['veiculo' => $veiculo]);
    }

    public function edit(veiculo $veiculo){
        return view('veiculos.edit', ['veiculo' => $veiculo]);   
     }

     public function editar(Request $Request, veiculo $veiculo){
        
        $veiculo->nome = $Request->nome;
        $veiculo->marca = $Request->marca;
        $veiculo->cor = $Request->cor;
        $veiculo->ano = $Request->ano;
        $veiculo->placa = $Request->placa;

        $veiculo->save();
        return redirect()->route('veiculos');

    }

    
    public function delete(veiculo $veiculo){
        $veiculo->delete();
        return redirect()->route('veiculos');
     }

     public function modal($id){
        $veiculos = veiculo::orderby('id', 'desc')->paginate('99999');
        return view('veiculos.index', ['veiculos' => $veiculos, 'id' => $id]);

     }

}


