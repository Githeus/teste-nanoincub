<?php

namespace App\Http\Controllers;

use App\Actions\FuncionarioActions;
use App\Funcionario;
use App\Http\Requests\StoreFuncionario;
use App\Http\Requests\UpdateFuncionario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    /**
     * Retorna a listagem de funcionários
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::paginate(3);
        return view('funcionarios.index',compact('funcionarios'));
    }
    
    /**
     * Retorna o formulário de cadastro de funcionário
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Salva as informações do funcionário na database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFuncionario $request)
    {
        DB::beginTransaction();

        try{
            FuncionarioActions::create($request->validated());
        }catch(Exception $e){
            DB::rollback();
            return redirect()->route('funcionarios.index')->with('error','Não foi possível cadastrar o funcionário no momento');
        }

        DB::commit();
        return redirect()->route('funcionarios.index')->with('success','Funcionário cadastrado com sucesso');
    }

    /**
     * Retorna o formulário para editar algum funcionário
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit',compact('funcionario'));
    }

    /**
     * Atualiza as informações de algum funcionario
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFuncionario $request, Funcionario $funcionario)
    {
        DB::beginTransaction();

        try{
            FuncionarioActions::update($request->validated(), $funcionario);
            
        }catch(Exception $e){
            DB::rollback();
            return redirect()->route('funcionarios.index')->with('error','Não foi possível atualizar as informações do funcionário no momento');
        }

        DB::commit();
        return redirect()->route('funcionarios.index')->with('success','Informações do funcionário alterada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }
}
