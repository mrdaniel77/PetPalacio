<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaboradores;

class ColaboradoresController extends Controller
{
    public function index(Request $request){
        $pesquisa = $request->pesquisa;
        if(!empty($pesquisa)){
            $colaborador = Colaboradores::where('nome', 'like', "%". $pesquisa."%")
                            ->orwhere('cpf', 'like', "%". $pesquisa."%")
                            ->orwhere('perfil', 'like', "%". $pesquisa."%")
                            ->paginate(10)->withQueryString();
        }else{
            $colaborador = Colaboradores::orderBy('created_at','asc')
                            ->paginate(10);
        }   
       
        return view('colaboradores.index', compact('colaborador'));
    }
    public function novo(){

        return view('colaboradores.form');
    }
    public function editar($id){

        $colaborador = Colaboradores::find($id);

        return view('colaboradores.form', compact('colaborador'));
    }
    public function salvar(Request $request){

        if(empty($request->id)){
            $colaboradores = Colaboradores::create($request->all());
            $message = 'Salvo com sucesso';
        }else{
            $colaboradores = Colaboradores::find($request->id);
            $colaboradores->update($request->all());
            $message = 'Alterado com sucesso!';
        }
        return redirect('/colaborador')->with('success', $message);
    }
    public function deletar($id){
       
        $colaborador = Colaboradores::find($id);
        if(!empty($colaborador->id)){
            $colaborador->delete();
            $message = 'Deletado com sucesso';
        }else{
            $message = 'Registro não encontrado';
        }

        return redirect('/colaborador')->with('danger', $message);
    }
}
