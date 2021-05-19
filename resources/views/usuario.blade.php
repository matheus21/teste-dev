<form method="POST" action="{{url('/post')}}">

    @if(isset($camposInvalidos))
        <ul>
            @foreach($camposInvalidos as $campoInvalido)
                <li>{{$campoInvalido}}</li>
            @endforeach
        </ul>
    @endif

    @if(isset($id))
        <h2>Usuário cadastrado com sucesso! ID: {{$id}}</h2>
    @endif

    <div>
        <label for="userName">Nome do usuário:</label>
        <input type="text" id="userName" name="userName">
    </div>
    <div>
        <label for="zipCode">CEP</label>
        <input type="text" id="zipCode" name="zipCode">
    </div>
    <div>
        <label for="phoneNumber">Número do telefone:</label>
        <input type="text" id="phoneNumber" name="phoneNumber">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
    </div>
    <div>
        <label for="password">Senha (8 caracteres mínimo, contendo pelo menos 1 letra e 1
            número):</label>
        <input type="password" id="password" name="password">
    </div>
    <input type="submit" value="Cadastrar">
</form>
