<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_completo',255);
            $table->string('login')->unique();
            $table->string('senha');
            $table->float('saldo_atual',10,2)->default(0);
            $table->bigInteger('administrador_id')->unsigned()->nullable()->comment("administrador que cadastrou o funcionario");
            $table->foreign('administrador_id')
                    ->references('id')->on('administradores')
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
        Schema::dropIfExists('funcionarios');
    }
}
