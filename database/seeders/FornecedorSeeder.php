<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\Fornecedor;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'www.for.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fornecedor@forncedor.com.br';
        $fornecedor->save();

        //o metodo create (atenção para o atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'fornecedor 200',
            'site' => '.com.br',
            'uf' => 'RS', 
            'email' => 'der.com.br'
        ]);

        // DB::table('fornecedores')->insert([
        //     'nome' => 'fornecedor 300',
        //     'site' => '300.com.br',
        //     'uf' => 'PR', 
        //     'email' => 'der300.com.br'
        // ]);
    }
}
