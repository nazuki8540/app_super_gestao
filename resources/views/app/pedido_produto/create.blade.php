@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')
    
@section('conteudo')
<div class="conteudo-pagina">


    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao pedido</p>
       

    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index')}}">Voltar</a>
            <li><a href="">Consulta</a>

        </ul>
    </div>
    <div class="informacao-pagina">
        <h4>Detalhes do pedido</h4>
          <p>Id do pedido : {{ $pedido->id }}</p>
          <p>Cliente : {{ $pedido->cliente_id }}</p>

        <div style="width:30%; margin-left:auto;margin-right:auto;">
          @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
              
          @endcomponent
        </div>
    </div>
    
</div>
@endsection