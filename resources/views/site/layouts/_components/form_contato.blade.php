
{{ $slot }}
{{ $classe }}
<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input type="text" placeholder="Nome" value="{{old('nome')}}" name="nome" class="{{$classe}}">
    @if($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    <br>
    <input type="text" placeholder="Telefone" value="{{old('telefone')}}" name="telefone" class="{{$classe}}">
    {{$errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input type="text" placeholder="E-mail" value="{{old('email')}}" name="email" class="{{$classe}}">
    {{$errors->has('email') ? $errors->first('email') : '' }}
    <br>

    <select class="{{$classe}}" name="motivo_contatos_id">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $key => $motivo_contatos)
            <option value="{{$key}}" {{old('motivo_contatos_id') == $key ? 'selected' : ''}}>{{$key}}</option>
        @endforeach
    </select>
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea class="{{$classe}}" name="mensagem">
        {{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}
    </textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
@if($errors->any())
<div style="position:absolute;top:0px;left:0px;width:100%;background:red;">
   @foreach($errors->all() as $erro)
    {{$erro}}<br>
   @endforeach

</div>
@endif