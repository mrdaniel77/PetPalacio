<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use App\Models\Clientes;
use PDF;

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

    public function exportarPDF($id){
        // Dados que serão passados para a view PDF
        $data = Clientes::find($id);

        // Carrega a view 'clientes.exportar' e passa os dados para a mesma
        $pdf = PDF::loadView('clientes.exportar', compact('data'));

        // Faz o download do PDF com o nome 'exportar.pdf'
        return $pdf->download('exportar.pdf');
    }

    public function salvar(Request $request)
{
    // Validar a requisição (não está funcionando, verificar)
    $request->validate([
        'foto_temp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if (!empty($request->foto_temp)) {
        $foto = $request->file('foto_temp');
        unset($request['foto_temp']);

        // RESGATA EXTENSÃO DO ARQUIVO
        $extension = $foto->extension();
        // NOME UNICO DO ARQUIVO + EXTENSÃO
        $nome = uniqid('documento_') . '.' . $extension;
        $path = $foto->storeAs('foto', $nome);
        // INSERE O VALOR DA FOTO NA REQUEST
        $request->merge(['foto' => $path]);

        // Redimensionar a imagem apenas se ela foi carregada corretamente
        Image::make($foto)->fit(300, 300)->save(public_path("storage/{$path}"));
    }
    //DEFININDO VARIAVEL DE MENSAGEM
    try {
        if (empty($request->id)) {
            $cliente = Clientes::create($request->all());
            $message = "Salvo com sucesso!";
        } else {
            $cliente = Clientes::find($request->id);
            $cliente->update($request->all());
            
            $message = "Alterado com sucesso!";
           
        }
    } catch (\Exception $e) {
        // Código a ser executado se ocorrer uma exceção
        return redirect()->back()->withErrors(['erro' => 'Algo deu errado.']);
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
