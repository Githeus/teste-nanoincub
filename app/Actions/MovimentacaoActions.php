<?php

namespace App\Actions;
use App\Movimentacao;

class MovimentacaoActions {
    public static function create($inputs){
        $inputs['administrador_id'] = auth()->user()->id;
        Movimentacao::create($inputs);
    }
}