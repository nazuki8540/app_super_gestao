<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function fornecedores(){
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor 1',
                 'status' => 'N',
                'cnpj' => '00'
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'S'
            ]
        ];

        return view('app.fornecedor.index',compact('fornecedores'));
    }
}
