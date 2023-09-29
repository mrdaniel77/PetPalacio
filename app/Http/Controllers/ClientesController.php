<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    public function index(Request $request){

        $pesquisa = $request->pesquisa;
        if(!empty($pesquisa)){
            $cliente = Clientes::where('nome', 'like', "%". $pesquisa."%")
                            ->orwhere('cpf', 'like', "%". $pesquisa."%")
                            ->orwhere('email', 'like', "%". $pesquisa."%")
                            ->paginate(10)->withQueryString();
        }else{
            $cliente = Clientes::orderBy('created_at','asc')
                            ->paginate(10);
        } 

        return view('clientes.index', compact('cliente'));
    }
    public function novo(){
        return view('clientes.form');
    }
    public function editar($id){

        $cliente = Clientes::find($id);

        return view('clientes.form', compact('cliente'));
    }
    public function salvar(Request $request){

        if(empty($request->id)){
            $cliente = Clientes::create($request->all());
            $message = "Salvo com sucesso !";
        }else{
            $cliente = Clientes::find($request->id);
            $cliente->update($request->all());
            $message = "Alterado com sucesso !";
        }
        return redirect('/cliente')->with('success', $message);
    }
    public function deletar($id){

        $cliente = Clientes::find($id);
        if(!empty($cliente->id)){
            $cliente->delete();
            $message = 'Deletado com sucesso';
        }else{
            $message = 'Registro não encontrado';
        }

        return redirect('/cliente')->with('danger', $message);
    }
}
