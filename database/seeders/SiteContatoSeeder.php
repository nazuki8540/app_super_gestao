<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\siteContato;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema sg';
        // $contato->telefone = '41996357137';
        // $contato->email = 'sistema.com.br';
        // $contato->motivo_contato = '1';
        // $contato->mensagem = 'Seja bem vindo! SG';
        // $contato->save();

        \App\Models\siteContato::factory()->count(100)->create();
    }
}
