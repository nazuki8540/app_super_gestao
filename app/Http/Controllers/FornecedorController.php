<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }
//listar 

    public function listar(Request $request)
    {
        // dd($request->all());
        $fornecedores = Fornecedor::where('nome','like', '%'.$request->input('nome').'%')
            ->where('site','like','%'.$request->input('site').'%')
            ->where('uf','like','%'.$request->input('uf').'%')
            ->where('email','like','%'.$request->input('email').'%')
            ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all() ]);
    }
    //adicionar 

    public function adicionar(Request $request){
        $msn = "";
        if($request->input('_token') != '' && $request->input('id') == ''){

            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());


            $msn = "Cadastro realizado com sucesso!";
        }

    //edição

    if($request->input('_token') != '' && $request->input('id') != ''){
        $fornecedor = Fornecedor::find($request->input('id'));
        $update = $fornecedor->update($request->all());

        if($update){
            $msn = "Atualização realizado com sucesso";
        }else{
            $msn = 'Atualização com problema';
        }

        return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msn' => $msn]);
    }    
        return view('app.fornecedor.adicionar', ['msn' => $msn]);
    }

    public function editar($id, $msn = '')
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar',['fornecedor' => $fornecedor, 'msn' => $msn]);
    }

    //excluir

    public function excluir($id) {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }

}
