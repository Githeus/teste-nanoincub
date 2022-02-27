<?php

namespace App\Actions;

use App\Funcionario;

class FuncionarioActions{
    public static function create($inputs){
        $inputs['administrador_id'] = auth()->user()->id;
        Funcionario::create($inputs);
    }
    public static function update($data, Funcionario $f){
        $f->update($data);
    }
    
    /* 
        Movimenta o saldo do funcionário
        Parâmetro: ['funcionario_id','tipo_movimentacao','valor']
    */
    public static function movimenta($info){
        $funcionario = Funcionario::findOrFail($info['funcionario_id']);
        // Verifica se é uma entrada ou saída, 
        // e realiza a conversão do valor para adição ou subtração no saldo do funcionário
        $saldo = $info['tipo_movimentacao'] == 'entrada' ? $info['valor']:$info['valor']*= -1;

        self::update([
            'saldo_atual'=>$funcionario->saldo_atual + $saldo
        ],$funcionario);
    }
}