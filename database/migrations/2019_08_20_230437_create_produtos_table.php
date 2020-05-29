<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // o metodo up diz ao laravel como criar a tabela com a migration
        // A partir da classe Schema é chamado o metodo create() passando o nome da tabela a ser criada
        // e uma função callback que recebe a instância de Blueprint, classe que cria um objeto que
        // simula a tabela que será crida.
        Schema::create('produtos', function (Blueprint $table) {
            // A classe Blueprint possui diversos metodos que descrevem tipos de capos em uma tebela de um DB
            // como os a baixo.
            $table->increments('id');
            // a tablea $table terá um campo alto increment com o nome 'id'
            $table->string('nome');
            // a tabela $table terá um campo do tipo string chamado 'nome'
            $table->decimal('valor', 7, 2); // campo chamado valor, do tipo decimal, com 7 casas antes e 2 casas depois da virgula.
            $table->string('descricao');
            $table->integer('quantidade');
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
        // O metodo down() ensima ao laravel como resetar as alterações provocadas por esta
        // migration, através do metodo Schema::dorpIfExist('apaga se existir') o estado do DB
        // antes da execução da migration atual é restaurado.
        Schema::dropIfExists('produtos');
    }
}
