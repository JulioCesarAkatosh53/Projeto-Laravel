<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitarEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitar_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_s_evento');
            $table->string('local_s_sala');
            $table->string('cidade_s');
            $table->string('data_s_inicio');
            $table->string('data_s_fim');
            $table->time('hora_s_inicio');
            $table->time('hora_s_fim');
            $table->string('tipo_s');
            $table->float('valor_s');
            $table->integer('vagas_s');
            $table->string('evento_s');
            $table->string('descricao_s');
            $table->string('arquivo_s');
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
        Schema::dropIfExists('solicitar_eventos');
    }
}
