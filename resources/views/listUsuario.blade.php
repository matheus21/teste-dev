<div>
    <h2>Lista de usuarios</h2>
    @if(isset($usuario))
        <ul>
            <li>ID: {{$usuario['id']}}</li>
            <li>NOME: {{$usuario['userName']}}</li>
            <li>TELEFONE: {{$usuario['phoneNumber']}}</li>
            <li>EMAIL: {{$usuario['email']}}</li>
            <li>CEP: {{$usuario['zipcode']}}</li>
        </ul>
    @endif
</div>