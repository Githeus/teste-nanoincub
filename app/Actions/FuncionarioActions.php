<?php

namespace App\Actions;

use App\Funcionario;

class FuncionarioActions{
    public static function create($inputs){
        Funcionario::create($inputs);
    }
    public static function update($data, Funcionario $f){
        $f->update($data);
    } 
}