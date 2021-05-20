# Prova dev

Para realizar o teste foi utilizado o framework Lumen, abaixo seguem algumas instruções úteis para executar o projeto:

- Instalação de libs `php-curl` e `php-xml` (sudo apt install php-curl php-xml)
- Executar o comando `composer install` na raiz do projeto (prova_dev)
- Para subir o projeto, executar o comando: `php -S localhost:8005 -t public` (Ou qualquer outra porta no lugar de `8005`)

## Rotas

As funcionalidades do exercício 1, e implementação do exercício 2 estão presentes nas rotas:

- `http://localhost:8005/` -> Formulário de cadastro
- `http://localhost:8005/lista` -> Consulta de usuário
- `http://localhost:8005/curl` -> Chamada CURL
- `http://localhost:8005/exercicios` -> Exercício 2

## Código

Os códigos para avaliação são encontrados em: 
- `app/Http/Controllers/TesteController.php` -> Implementação do exercício 1
- `resources/views/usuario.blade.php` -> Formulário do exercício 1
- `resources/views/exercicios.blade.php` -> Implementações exercício 2

**Arquivo com comandos SQL do exercício 3 está no arquivo `exercicio3.sql` na raiz do projeto**

Obrigado =)
