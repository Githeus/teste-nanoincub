<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Funcionario extends Model
{
    protected $appends = ['saldo_atual'];

    public function getSaldoAtualAttribute($v){
        $fmt = new NumberFormatter( 'pt-BR', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($v, "BRL");
    }
}
