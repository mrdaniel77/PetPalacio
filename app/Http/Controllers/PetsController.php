<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pets;
use App\Models\Clientes;

class PetsController extends Controller
{
    public function index(Request $request){
        $pesquisa = $request->pesquisa;
        if(!empty($pesquisa)){
            $pet = Pets::with('cliente')
                            ->where('nome', 'like', "%". $pesquisa."%")
                            ->orwhere('raca', 'like', "%". $pesquisa."%")
                            ->orwhere('peso', 'like', "%". $pesquisa."%")
                            ->orWhereHas('cliente', function ($query) use ($pesquisa){
                                $query->where('nome', 'like', "%".$pesquisa."%");
                            })->paginate(10);
        }else{
            $pet = Pets::with('cliente')
                            ->orderBy('created_at','asc')
                            ->paginate(10);
        }   
        return view('pets.index', compact('pet'));
    }
    public function novo(){

        $dono = Clientes::select('id', 'nome', 'cpf')->get();

        return view('pets.form', compact('dono'));
    }
    public function editar($id){
        

        $pet = Pets::find($id);
        $dono = Clientes::select('id', 'nome', 'cpf')->get();

        return view('pets.form', compact('pet', 'dono'));
    }
    public function salvar(Request $request){

        if(empty($request->id)){
            $pet = Pets::create($request->all());
            $message = "Salvo com sucesso !";
        }else{
            $pet = Pets::find($request->id);
            $pet->update($request->all());
            $message = "Alterado com sucesso !";
        }

        return redirect('/pet')->with('success', $message);
    }
    public function deletar($id){
        $pet = Pets::find($id);
        if(!empty($pet->id)){
            $pet->delete();
            $message = 'Deletado com sucesso';
        }else{
            $message = 'Registro não encontrado';
        }

        return redirect('/pet')->with('danger', $message);
    }
}
