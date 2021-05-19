<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Mixed_;

class TesteController extends Controller
{

    const PASSWORD_MIN_LENGTH = 8;

    private $camposInvalidos;
    private $id;
    private $Usuario;

    public function __construct()
    {
        $this->camposInvalidos = [];
        $this->Usuario         = [];
        $this->id              = 0;
    }

    public function exercicios()
    {
        return view('exercicios');
    }

    public function curlRequest() {
        $url = 'https://www.superheroapi.com/api.php/2283325505135053/70';
        $retorno = $this->curl($url, []);
        dd($retorno);
    }

    public function form()
    {
        return view('usuario');
    }

    public function post(Request $request)
    {
        $informacao = $request->all();

        if (!empty($this->validarCampos($informacao))) {
            return view("usuario", ['camposInvalidos' => $this->camposInvalidos]);
        }

        $id = $this->insert('Usuario', $informacao);

        return view("usuario", ['id' => $id]);
    }

    public function get()
    {
        $usuario = [
            'id'          => 1,
            'zipcode'     => "79103-670",
            'email'       => "matheus@mail.com",
            'phoneNumber' => "(67)99999-9999",
            'userName'    => "Matheus"
        ];

        $usuarioEncontrado = $this->select('Usuario', $usuario);

        return view("listUsuario", [
            'usuarioEncontrado' => $usuarioEncontrado,
            'usuario'           => $this->Usuario,
        ]);
    }

    public function insert(string $nome_da_tabela, array $informacao): int
    {
        $this->id         += 1;
        $informacao['id'] = $this->id;
        $this->Usuario    = [$nome_da_tabela => [$this->id => $informacao]];

        return $this->id;
    }

    public function select(string $nome_da_tabela, array $informacao): bool
    {
        $this->$nome_da_tabela = $informacao;

        return !empty($this->$nome_da_tabela);
    }

    public function curl(string $url, array $informacao)
    {
        $curlConnection = curl_init();

        curl_setopt($curlConnection, CURLOPT_URL, $url);
        curl_setopt($curlConnection, CURLOPT_RETURNTRANSFER, true);

        $herois = curl_exec($curlConnection);
        curl_close($curlConnection);

        return $herois;
    }

    public function validarCampos(array $informacao): array
    {
        $this->validaCep($informacao['zipCode']);
        $this->validaEmail($informacao['email']);
        $this->validaFone($informacao['phoneNumber']);
        $this->validaSenha($informacao['password']);
        $this->validaNome($informacao['userName']);

        return $this->camposInvalidos;
    }

    public function validaCep(string $cep): void
    {
        $valido = preg_match("/[0-9]{4}-[0-9]{3}$/", $cep) && !empty($cep);

        $this->atribuiErro
        (
            $valido,
            "CEP",
            "O campo não pode ser vazio e deve possuir o formato '99999-999'."
        );
    }

    public function validaFone(string $fone): void
    {
        $valido = preg_match("/\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}$/", $fone) && !empty($fone);

        $this->atribuiErro
        (
            $valido,
            "TELEFONE",
            "O campo não pode ser vazio e deve possuir o formato '(99)9999-9999' ou '(99)99999-9999'."
        );
    }

    public function validaEmail(string $email): void
    {
        $valido = filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email);

        $this->atribuiErro
        (
            $valido,
            "EMAIL",
            "O campo não pode ser vazio e deve possuir o formato 'nome@mail.com'."
        );
    }

    public function validaSenha(string $senha): void
    {
        $valido = preg_match("/[a-zA-Z]+\d|\d+[a-zA-Z]/", $senha) &&
            strlen($senha) >= self::PASSWORD_MIN_LENGTH
            && !empty($senha);

        $this->atribuiErro
        (
            $valido,
            "SENHA",
            "O campo não pode ser vazio e deve possuir pelo menos 8 caracteres, com letras e números."
        );
    }

    public function validaNome(string $nome): void
    {
        $valido = !empty($nome);

        $this->atribuiErro($valido, "NOME", "O campo não pode ser vazio.");
    }

    public function atribuiErro(bool $valido, string $nomeCampo, string $formatoValido): void
    {
        if (!$valido) {
            array_push($this->camposInvalidos, 'Campo ' . $nomeCampo . ' inválido. ' . $formatoValido);
        }
    }
}
