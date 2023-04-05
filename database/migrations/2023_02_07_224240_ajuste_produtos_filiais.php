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
        //criando tabela filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial',30);
            $table->timestamps();
        });

        //criando tabela produto_filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('preco_vendas',8,2);
            $table->integer('preco_maximo');
            $table->integer('preco_minimo');
            $table->timestamps();

            //foreign key(constraints)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //removendo colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_minimo','estoque_maximo']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         //adicionando colunas da tabela produtos
         Schema::table('produtos', function(Blueprint $table){
            $table->integer('preco_venda',8, 2);
            $table->integer('estoque_minimo',8, 2);
            $table->integer('estoque_maximo',8, 2);
            $table->dropColumn(['preco_venda', 'estoque_minimo','estoque_maximo']);
        });

        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
};
