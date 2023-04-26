@extends('app.layouts.basico')

@section('titulo', 'Produto')
    
@section('conteudo')
<div class="conteudo-pagina">


    <div class="titulo-pagina-2">
        <p>Adicionar Produto</p>

    </div>
    <div class="menu">
        <ul>
            <li><a href="">Novo</a>
            <li><a href="">Consulta</a>

            </li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%; margin-left:auto;margin-right:auto;">
            <form method="post" action="">
                
                @csrf
                <input type="text" name="nome" value=""  placeholder ="Nome" class="borda-preta">
                <input type="text" name="descricao" value="" placeholder ="Descrição" class="borda-preta">
                <input type="text" name="peso"  value=""  placeholder ="Peso" class="borda-preta">
                <input type="text" name="email" value="" placeholder ="E-mail"  class="borda-preta">
                <select name="unidade_id" id="unidade_id">
                    <option value=""> --Selecione a Unidade de Medida -- </option>
                    <option value="1">Unidade</option>
                </select>
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>

        </div>
    </div>
    
</div>
@endsection