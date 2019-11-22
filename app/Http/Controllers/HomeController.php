<?php

namespace App\Http\Controllers;

use App\Usuario;

use Illuminate\Http\Request; // Toda informação que o usuario pida. Usuario, navegador, get, post, tudo.

class HomeController extends Controller
{
    //

    public function viewHome(){
        // $usuario = new Usuario();
        // $listaUsuarios = $usuario->all(); // consulta y hace el query de la base de datos
        // dd($listaUsuarios);

        $listaUsuarios = Usuario::all(); // lo mismo que el código comentado más arriba
        return view('home',["listaUsuarios"=>$listaUsuarios]);
    }

    public function request(Request $request, $id=0){ // coloca el nombre del nuevo objeto a generar a partir de la clase y la ruta parametrizada que va a mandar
        if($id==0){
            echo "Passa alguma coisa aí rapaz";
        } // Este es el vardump de Láravel. Imprime todas las informaciones //
    }

    public function exibirFormulario(){
        return view('formulario');
    }

    public function cadastrarFormulario(Request $request){ //Clase más objeto dentro de paréntesis
        dd($request->nome);
    }

}

