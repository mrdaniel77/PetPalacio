<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Agendamentos;
use App\Models\Pets;
use App\Models\Clientes;
use App\Models\Servicos;

class AgendamentosController extends Controller
{
    public $horarios = ['08:00 ás 09:00', 
    '09:00 ás 10:00', 
    '10:00 ás 11:00', 
    '11:00 ás 12:00', 
    '14:00 ás 15:00', 
    '15:00 ás 16:00', 
    '17:00 ás 18:00',
];

    public function index(){
        $agendamento = Agendamentos::get();
        return view('agendamento.index', compact('agendamento'));
    }

    public function create(){
        
        $horarios = $this->horarios;
        $agendamento = Agendamentos::with('cliente','pet',)->get();
        $clientes = Clientes::get();
        $pets = Pets::get();

        return view('agendamento.form', compact('agendamento', 'clientes', 'pets','horarios'));
    }

    public function edit($id){
        return redirect('/agendamento/store');
    }

    public function store(Request $request){
        
        if(!empty($request->id)){
            $agendamento = Agendamentos::find($request->id);
            $agendamento->update($request->all());
            $message = 'Atualizado com sucesso';
        }else{
            $agendamento = Agendamentos::create($request->all());

            $message = 'Salvo com sucesso';
        }

        return redirect('/agendamento')->with('success' , $message);
    }

    public function destroy($id){

        DB::beginTransaction();
        try{           
            $agendamento = Agendamentos::find($id);
            
            if(!empty($agendamento->id)){
                $agendamento->delete();
                $message = 'Deletado com sucesso';
            }
            DB::commit();

            return redirect('/agendamento')->with('danger', $message);

        }catch(\Exception  $e){
            DB::rollback();
            $message = 'Registro não encontrado';
            //Log::warning('Erro ao salvar: ', ['error' => $e->getMessage()]);

            return redirect()->back()->with('danger', $message);
        }
    }

    public function agendamento_cliente($cliente_id)
{
    $pets = Pets::where('cliente_id', $cliente_id)->get();
    
    return response()->json($pets);
}
}
