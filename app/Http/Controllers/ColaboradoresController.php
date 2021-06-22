<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\colaboradore;
use App\Models\equipe;

class ColaboradoresController extends Controller
{
    public function index(){
       
        $colaboradores = colaboradore::orderby('id', 'desc')->paginate('99999');
        $equipe = equipe::all();
        
        return view('colaboradores.index', ['colaboradores' => $colaboradores, 'equipe' => $equipe]);
        
        
    }


    public function create(){

        $equipe = equipe::all();
        return view('colaboradores.create', ['equipe' => $equipe]);
    }

    public function insert(Request $Request){
        $colaborador = new colaboradore();
        
        

        $colaborador->nome = $Request->nome;
        $colaborador->salario = $Request->salario;
        $colaborador->data_de_nascimento = $Request->data_de_nascimento;
        $colaborador->sexo = $Request->sexo;
        $colaborador->cod = $Request->cod;
        $colaborador->senha = $Request->senha;
        $colaborador->email = $Request->email;

        $colaborador->save();

       
        
        return redirect()->route('colaboradores');

    }


    public function show($id){
        $colaborador = colaboradore::find($id);

        

        return view('colaboradores.show', ['colaborador' => $colaborador]);
    }

    public function edit(colaboradore $colaborador, equipe $equipe){
        $equipe = equipe::all();
        return view('colaboradores.edit', ['colaborador' => $colaborador, 'equipe'=> $equipe]);   
     }

     public function editar(Request $Request, colaboradore $colaborador){
        
        $colaborador->nome = $Request->nome;
        $colaborador->salario = $Request->salario;
        $colaborador->data_de_nascimento = $Request->data_de_nascimento;
        $colaborador->sexo = $Request->sexo;
        $colaborador->cod = $Request->cod;
        $colaborador->senha = $Request->senha;
        $colaborador->email = $Request->email;
        $colaborador->save();
        return redirect()->route('colaboradores');

    }

    
    public function delete(colaboradore $colaborador){
        $colaborador->delete();
        //$equipe->delete();
        return redirect()->route('colaboradores');
     }

     public function modal($id){
        $colaboradores = colaboradore::orderby('id', 'desc')->paginate('99999');
       // return view('colaboradores.index', ['colaboradores' => $colaboradores, 'id' => $id]);

        
        $equipe = equipe::all();
        return view('colaboradores.index', ['colaboradores' => $colaboradores, 'id' => $id,  'equipe' => $equipe]);

     }

}

