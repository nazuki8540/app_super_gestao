<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use App\Models\Fornecedor;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['ProdutoDetalhe', 'fornecedor'])->paginate(10);
        
         return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all() ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create',['unidades' => $unidades, 'fornecedores' => $fornecedores ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $regras = 
        [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = 
        [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 letras',
            'nome.max' => 'O campo nome deve ter no maximo 40 letras',
            'descricao.min' => 'O campo descrição deve ter no minimo 3 letras',
            'descricao.max' => 'O campo descrição deve ter no maximo 2000 letras',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'A fornecedor informado não existe'
        ];

        $request->validate($regras,$feedback);

        Item::Create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show',['produto' => $produto ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all(); 
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto'=> $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        // return view('app.produto.create', ['produto'=> $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = 
        [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = 
        [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 letras',
            'nome.max' => 'O campo nome deve ter no maximo 40 letras',
            'descricao.min' => 'O campo descrição deve ter no minimo 3 letras',
            'descricao.max' => 'O campo descrição deve ter no maximo 2000 letras',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'A fornecedor informado não existe'

        ];

        $request->validate($regras,$feedback);
        
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index', ['produto' => $produto->id]);
    }
}
