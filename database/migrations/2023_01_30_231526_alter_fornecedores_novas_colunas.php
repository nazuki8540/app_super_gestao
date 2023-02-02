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
        Schema::table('fornecedores', function (Blueprint $table) {
           $table->string('uf',2);
           $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
           //para remover colunas

           //$table->dropColumn('uf');
           //$table->dropColumn('email');
           //ou pode usar os dois na mesma linha

           //$table->dropColumn(['uf','email']);
         });
    }
};
