<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Movimentacao extends Model
{
    protected $table = 'movimentacoes';
    protected $fillable = ['tipo_movimentacao','valor','observacao','administrador_id','funcionario_id'];

    public function valor_formatado(){
        $fmt = new NumberFormatter( 'pt-BR', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($this->valor, "BRL");
    }
    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
