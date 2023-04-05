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
       //adicionando colunas da tabela produtos
       Schema::table('fornecedores', function(Blueprint $table){
        $table->string('site',150)->after('nome')->nullable();
       
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
        Schema::table('fornecedores', function(Blueprint $table){
            $table->dropColumn('site');
        });
    }
};
