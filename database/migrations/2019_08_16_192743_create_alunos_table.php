<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100);
            $table->date('data_nascimento');
            $table->string('logradouro', 50);
            $table->integer('numero');
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('estado', 50);
            $table->string('cep', 9);
            $table->bigInteger('id_curso')
                ->references('id')
                ->on('cursos');
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
        Schema::dropIfExists('alunos');
    }
}
