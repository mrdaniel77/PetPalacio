<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;

class ServicosController extends Controller
{
    public function index(Request $request){
        $pesquisa = $request->pesquisa;
        if(!empty($pesquisa)){
            $servico = Servicos::with('cliente')
                            ->where('nome', 'like', "%". $pesquisa."%")
                            ->orwhere('preco', 'like', "%". $pesquisa."%")
                            ->orwhere('descricao', 'like', "%". $pesquisa."%")
                            ->paginate(10)->withQueryString();
        }else{
            $servico = Servicos::orderBy('created_at','asc')
                            ->paginate(10);
        }   
       
        return view('servicos.index', compact('servico'));
    }
    public function novo(){

        return view('servicos.form');
    }
    public function editar($id){

        $servico = Servicos::find($id);

        return view('servicos.form', compact('servico'));
    }
    public function salvar(Request $request){

        if(empty($request->id)){
            $servico = Servicos::create($request->all());
            $message = "Salvo com sucesso !";
        }else{
            $servico = Servicos::find($request->id);
            $servico->update($request->all());
            $message = "Alterado com sucesso !";
        }

        return redirect('/servico')->with('success', $message);
    }
    public function deletar($id){
        $servico = Servicos::find($id);
        if(!empty($servicos->id)){
            $servico->delete();
            $message = 'Deletado com sucesso';
        }else{
            $message = 'Registro não encontrado';
        }

        return redirect('/servico')->with('danger', $message);
    }
}
