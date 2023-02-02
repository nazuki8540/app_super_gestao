
{{ $slot }}
{{ $classe }}
<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input type="text" placeholder="Nome" name="name" class="{{$classe}}">
    <br>
    <input type="text" placeholder="Telefone" name="telefone" class="{{$classe}}">
    <br>
    <input type="text" placeholder="E-mail" name="email" class="{{$classe}}">
    <br>
    <select class="{{$classe}}" name="motivoContato">
        <option value="">Qual o motivo do contato?</option>
        <option value="">Dúvida</option>
        <option value="">Elogio</option>
        <option value="">Reclamação</option>
    </select>
    <br>
    <textarea class="{{$classe}}" name="mensagem">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>