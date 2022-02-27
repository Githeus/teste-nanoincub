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
        $tipo = isset($_GET['tipo'])? $_GET['tipo']:false;
        $funcionarios = false;
        if($nome)
            $funcionarios = Funcionario::where('nome_completo','like', '%'.$nome.'%')->pluck('id')->toArray();
        $movimentacoes = Movimentacao::when($funcionarios, function ($query, $funcionarios) {
                            return $query->whereIn('funcionario_id',$funcionarios);
                        })
                        ->when($data, function ($query, $data) {
                            return $query->whereDate('created_at', $data);
                        })
                        ->when($data, function ($query, $data) {
                            return $query->whereDate('created_at', $data);
                        })
                        ->when($tipo, function ($query, $tipo) {
                            return $query->where('tipo_movimentacao', $tipo);
                        })
                        ->paginate(5); 
        return view('movimentacoes.index',compact('movimentacoes','nome','data','tipo'));
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
}
