<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Funcionario extends Model
{
    protected $fillable = ['nome_completo','login','senha','saldo_atual','administrador_id'];

    public function saldo_formatado(){
        $fmt = new NumberFormatter( 'pt-BR', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($this->saldo_atual, "BRL");
    }

    public function movimentacoes(){
        return $this->hasMany(Movimentacao::class);
    }
}
