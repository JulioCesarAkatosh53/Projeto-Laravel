<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastroEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastro_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_evento');
            $table->string('local_sala');
            $table->string('cidade');
            $table->string('data_inicio');
            $table->string('data_fim');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->string('tipo');
            $table->float('valor');
            $table->integer('vagas');
            $table->string('arquivo');
            $table->string('descricao');
            $table->string('id_stts');
            // $table->foreign('id_stts')->references('id')->on('statuses');
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
        Schema::dropIfExists('cadastro_eventos');
    }
}
