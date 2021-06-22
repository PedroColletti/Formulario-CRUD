<?php

namespace App\Http\Controllers;
use App\Models\colaboradore;
use App\Models\equipe;
use Illuminate\Http\Request;


class UsuariosController extends Controller
{
    public function login(Request $request)
    {
        
        $email = $request->email;
        $senha = $request->senha;

        $colaboradores1 = colaboradore::where('email', '=', $email)->first();
        $colaboradores2 = colaboradore::where('senha', '=', $senha)->first();
        $colaboradores = colaboradore::where('email', '=', $email)->where('senha','=', $senha)->first();
        
        if($colaboradores == null)
        {
            if($colaboradores1 != null){
                $_SESSION['mensagem'] = "<div class= 'alert alert-danger'>Senha incorreta</div>";
                return view('home');

                
            }else if($colaboradores2 != null) {
                $_SESSION['mensagem'] = "<div class= 'alert alert-danger'>Email incorreto</div>";
                return view('home');


            }else{
                $_SESSION['mensagem'] = "<div class= 'alert alert-danger'>Dados incorretos</div>";
                return view('home');
            }
            
        }else{
                session_start(); 
                $_SESSION['id_usuario'] = $colaboradores->id;
                $_SESSION['nome_usuario'] = $colaboradores->nome;
                
                $colaboradores = colaboradore::orderby('id', 'desc')->paginate('99999');

                $equipe = equipe::all();
                return view('colaboradores.index', ['colaboradores' => $colaboradores, 'equipe' => $equipe]);
                
                }
    }


    public function logout(){
       @session_start();
       @session_destroy();
       return view('home');
    }

}
