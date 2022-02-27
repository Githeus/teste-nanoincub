<?php

namespace App\Http\Controllers;

use App\Actions\FuncionarioActions;
use App\Actions\MovimentacaoActions;
use App\Funcionario;
use App\Http\Requests\StoreMovimentacao;
use App\Movimentacao;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nome = isset($_GET['nome_completo'])? $_GET['nome_completo']:false;
        $data = isset($_GET['created_at'])? $_GET['created_at']:false;
        /* $funcionarios = Movimentacao::when($nome, function ($query, $nome) {
                            return $query->where('nome_completo','like', '%'.$nome.'%');
                        })
                        ->when($data, function ($query, $data) {
                            return $query->whereDate('created_at', $data);
                        })
                        ->paginate(3); */
        $movimentacoes = Movimentacao::paginate(5);
        return view('movimentacoes.index',compact('movimentacoes','nome','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('movimentacoes.create', compact('funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovimentacao $request)
    {
        DB::beginTransaction();
        try{
            MovimentacaoActions::create($request->validated());
            FuncionarioActions::movimenta($request->validated());
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('movimentacoes.index')->withErrors($e->getMessage());
        }
        DB::commit();
        return redirect()->route('movimentacoes.index')->with('success','Movimentação realizada com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movimentacao  $movimentacao
     * @return \Illuminate\Http\Response
     */
    public function show(Movimentacao $movimentacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movimentacao  $movimentacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimentacao $movimentacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movimentacao  $movimentacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimentacao $movimentacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movimentacao  $movimentacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimentacao $movimentacao)
    {
        //
    }
}
