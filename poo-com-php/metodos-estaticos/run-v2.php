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

$data = [
    [
        'id' => 123,
        'name' => 'Tiago',
        'email' => 'tiago@mail.com',
        'passport' => '878979',
    ],
    [
        'id' => 245,
        'name' => 'Rodrigo',
        'email' => 'rodrigo@mail.com',
        'cnh' => 'AB',
    ],
];

$keys = [];
foreach($data as $item) {
    $keys = array_unique(array_merge($keys, array_keys($item)));
}

$tabelaLinha = TabelaLinha::make();
foreach ($keys as $key) {
    $tabelaLinha->addCol(TabelaColuna::make(ucwords($key)));
}

$header->addRow($tabelaLinha);

var_export($keys);

// echo $tabela->toHtml(); // <table></table>

echo PHP_EOL;

foreach($data as $item) {
    echo str_repeat('-', 20) . PHP_EOL;

    foreach ($keys as $key) {
        echo sprintf('%s => %s', $key, $item[$key] ?? null) . PHP_EOL;
    }

    echo str_repeat('-', 20) . PHP_EOL;
}
