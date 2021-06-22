<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipe;

class EquipesController extends Controller
{
    public function index(){
       $equipes = equipe::paginate('99999');
       return view('equipes.index', ['equipes'=> $equipes]) ;
       
    }


    public function create(){
        return view('equipes.create');
    }

    public function insert(Request $Request){
        $equipe = new equipe();
        $equipe->nome = $Request->nome;
        $equipe->status = $Request->status;
        $equipe->descricao = $Request->descricao;
        $equipe->save();
        return redirect()->route('equipes');

    }


    public function show($id){
        $equipe = equipe::find($id);
        return view('equipes.show', ['equipe' => $equipe]);
    }

    public function edit(equipe $equipe){
        return view('equipes.edit', ['equipe' => $equipe]);   
     }

     public function editar(Request $Request, equipe $equipe){
        
        $equipe->nome = $Request->nome;
        $equipe->status = $Request->status;
        $equipe->descricao = $Request->descricao;

        $equipe->save();
        return redirect()->route('equipes');

    }

    
    public function delete(equipe $equipe){
        $equipe->delete();
        return redirect()->route('equipes');
     }

     public function modal($id){
        $equipes = equipe::orderby('id', 'desc')->paginate('99999');
        return view('equipes.index', ['equipes' => $equipes, 'id' => $id]);

     }

}

