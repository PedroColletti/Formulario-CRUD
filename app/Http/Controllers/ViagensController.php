<?php

namespace App\Http\Controllers;

use App\Models\colaboradore;
use App\Models\veiculo;
use Illuminate\Http\Request;
use App\Models\viagen;

class ViagensController extends Controller
{   
    //Numero total de registros da pagina



    public function index(){
       $viagens = viagen::paginate('99999');
       return view('viagens.index', ['viagens'=> $viagens]);
       
    }


    public function create(){

        $colaborador = colaboradore::all();
        $veiculo = veiculo::all();
        return view('viagens.create', ['colaborador' => $colaborador, 'veiculo' => $veiculo]);
       
    }

    

    public function insert(Request $Request){
        $viagem = new viagen();
        $viagem->motorista = $Request->motorista;
        $viagem->placa = $Request->placa;
        $viagem->data = $Request->data;

        $viagem->save();
        return redirect()->route('viagens');

    }


    public function show($id){
        $viagem = viagen::find($id);
        return view('viagens.show', ['viagem' => $viagem]);
    }

    public function edit(viagen $viagem){
        $colaborador = colaboradore::all();
        $veiculo = veiculo::all();
        return view('viagens.edit', ['viagem' => $viagem, 'colaborador' => $colaborador, 'veiculo' => $veiculo]);   
     }

     public function editar(Request $Request, viagen $viagem){
        
        $viagem->motorista = $Request->motorista;
        $viagem->placa = $Request->placa;
        $viagem->data = $Request->data;

        $viagem->save();
        return redirect()->route('viagens');

    }

    
    public function delete(viagen $viagem){
        $viagem->delete();
        return redirect()->route('viagens');
     }

     public function modal($id){
        $viagens = viagen::orderby('id', 'desc')->paginate('99999');
        return view('viagens.index', ['viagens' => $viagens, 'id' => $id]);

     }

}

