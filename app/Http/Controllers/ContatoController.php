<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\siteContato;
use Database\Seeders\SiteContatoSeeder;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contato = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', //min 3 varchar
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'

        ];
        $feedback =  [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no minimo 3 letras',
            'nome.max' => 'O campo nome precisa ter no max 40 letras',
            'nome.unique' => 'O nome informado ja esta cadastrado no banco',
            'email.email' => 'O email informado não é valido!',
            'mensagem.required' => 'Por favor digite sua mensagem',
            'mensagem.max' => 'Número maximo excedido (2000 caracteres)',
            'required' => 'O campo :attribute precisa ser preenchido'

        ];
        //validacao
        $request->validate($regras, $feedback);


        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
