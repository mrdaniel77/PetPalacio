<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{   
    public function index() {
        $usuario = User::all();
        return view('usuarios.index', compact('usuario'));
    }
    public function novo() {

        return view('usuarios.form');
    }
    public function editar($id) {

        $user = User::find($id);
        return view('usuarios.form', compact('user'));
    }
    public function salvar(Request $request) {
        
        if(!empty($request->password)){
            $request['password'] = bcrypt($request['password']);
        }else{
            unset($request['password']);
        }
        if(!empty($request->id)) {
            $user = User::find($request->id);
            $user->update($request->all());
        }else{
            $user = User::create($request->all());
        }
        return redirect('/usuario')->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $user = User::find($id);
        if(!empty($user)){
            $user->delete();
            return redirect('/usuario')->with('success', 'Deletado com sucesso!');
        }else{
            return redirect('/usuario')->with('danger', 'Registro não encontrado!');
        }
    }
}
