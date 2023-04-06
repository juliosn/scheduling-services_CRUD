<?php

namespace App\Http\Controllers;
use App\Models\Servicos;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function index(){
        return view('index');
    }
    
    public function listar(){
        $data = Servicos::get();
        //return $data;
        return view('listar-servicos', compact('data'));
    }

    public function salvar(Request $request){
        /* 
        Debug and Die:
        dd($request->all());
        */

        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'origem' => 'required',
            'datacont' => 'required',
            'obs' => 'required',
        ]);

        $nome = $request->nome;
        $telefone = $request->telefone;
        $origem = $request->origem;
        $datacont = $request->datacont;
        $obs = $request->obs;

        $ser = new Servicos();
        $ser->nome = $nome;
        $ser->telefone = $telefone;
        $ser->origem = $origem;
        $ser->datacont = $datacont;
        $ser->obs = $obs;
        $ser->save();

        return redirect()->back()->with('sucesso', 'Serviço cadastrado com sucesso!');
        
    }

    public function editar($id){
        $data = Servicos::where('id', '=', $id)->first();
        return view('editar-servicos', compact('data'));

    }

    public function atualizar(Request $request){
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'origem' => 'required',
            'datacont' => 'required',
            'obs' => 'required',
        ]);

        $id = $request->id;
        $nome = $request->nome;
        $telefone = $request->telefone;
        $origem = $request->origem;
        $datacont = $request->datacont;
        $obs = $request->obs;

        Servicos::where('id', '=', $id)->update([
            'nome'=>$nome,
            'telefone'=>$telefone,
            'origem'=>$origem,
            'datacont'=>$datacont,
            'obs'=>$obs,
        ]);

        return redirect()->back()->with('sucesso', 'Serviço atualizado com sucesso!');
    }

    public function excluir($id){
        Servicos::where('id', '=', $id)->delete();
        return redirect()->back()->with('sucesso', 'Serviço excluído com sucesso!');
    }
}
