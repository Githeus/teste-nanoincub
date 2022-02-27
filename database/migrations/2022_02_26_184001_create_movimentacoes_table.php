<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo_movimentacao',['entrada','saida']);
            $table->float('valor',10,2)->default(0);
            $table->string('observacao',255);
            $table->bigInteger('administrador_id')->unsigned()->nullable()->comment("administrador que cadastrou a movimentacao");
            $table->foreign('administrador_id')
                    ->references('id')->on('administradores')
                    ->onDelete('cascade');
            $table->bigInteger('funcionario_id')->unsigned()->nullable()->comment("funcionario que cadastrou a movimentacao");
            $table->foreign('funcionario_id')
                    ->references('id')->on('funcionarios')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacoes');
    }
}
