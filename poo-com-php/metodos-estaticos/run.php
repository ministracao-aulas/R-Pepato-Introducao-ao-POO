<?php

use \App\Tabela;
use \App\TabelaBody;
use \App\TabelaColuna;
use \App\TabelaHeader;
use \App\TabelaLinha;

require_once __DIR__ . '/App/Contracts/HtmlClass.php';
require_once __DIR__ . '/App/Concerns/HasStringableHtml.php';
require_once __DIR__ . '/App/Tabela.php';
require_once __DIR__ . '/App/TabelaBody.php';
require_once __DIR__ . '/App/TabelaColuna.php';
require_once __DIR__ . '/App/TabelaHeader.php';
require_once __DIR__ . '/App/TabelaLinha.php';

echo str_repeat('-', 20) . PHP_EOL;

// Estudar interfaces do PHP

$header = new TabelaHeader();

$tabela = (new Tabela())->header($header);

// var_export(get_class($header));
// var_export(get_class((object) [123, 123]));

$pessoa = new stdClass();
$pessoa->name = 'Tiago';
$pessoa->email = 'tiago@mail.com';
$pessoa->lastname = 'França';
$pessoa->fullName = fn() => "{$pessoa->name} {$pessoa->lastname}";
// $pessoa->fullName = function () use ($pessoa) {
//     return "{$pessoa->name} {$pessoa->lastname}";
// };

// $fname = $pessoa->fullName;
// var_dump($pessoa);
// var_export($pessoa);
// var_export($fname());
// var_export(call_user_func($pessoa->fullName));

// var_export(get_class_methods($header));

// var_export(call_user_func([$header, 'toHtml']));

// var_export(call_user_func([TabelaLinha::class, 'make'], [TabelaColuna::make('abc')]));

#[\AllowDynamicProperties()]
class Exemplo
{
    protected $data = [];

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        // $this->{$key} = $value;
    }

    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function __toString(): string
    {
        return json_encode($this->data, 64);
    }

    public function __invoke()
    {
        return $this->__toString();
    }
}

$objeto = new Exemplo();

$objeto->xyz = 123;

// echo $objeto->xyz;
// echo $objeto->abc;

// var_export($objeto);
// echo "Valor do meu objeto: {$objeto}sddd";
// echo $objeto->abc;

$nome = fn() => 'Tiago';

// echo $nome();

echo $objeto();
