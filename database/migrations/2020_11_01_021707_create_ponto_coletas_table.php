<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePontoColetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponto_coletas', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->longText('endereco');
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 8, 6);
            $table->unsignedBigInteger('cidade_id');
            $table->timestamps();

            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ponto_coletas');
    }
}
