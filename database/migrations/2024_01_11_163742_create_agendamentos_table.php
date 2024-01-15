<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->text('observacao_agendamento');
            /* RELACIONAMENTO CLIENTES */
            $table->unsignedBigInterger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            /* RELACIONAMENTO PETS */
            $table->unsignedBigInterger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');

            /* RELACIONAMENTO SERVIÇOS */
            $table->unsignedBigInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');            

            $table->date('data_agendamento');
            $table->time('horario_agendamento');
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
        Schema::dropIfExists('agendamentos');
    }
};
