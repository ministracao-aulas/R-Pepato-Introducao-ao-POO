<table>
    <thead>
        <tr>
            <th>Col1</th>
            <th>Col2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Col1</td>
            <td>Col2</td>
        </tr>
    </tbody>
</table>
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
/*
$header->addRow(
    (new TabelaLinha())->setCols(
        [
            (new TabelaColuna())->content('ID'),
            new TabelaColuna('Nome'),
            TabelaColuna::make('E-mail'),
        ]
    )
);
*/

$header->addRow(
    new TabelaLinha([
        (new TabelaColuna())->content('ID'),
        new TabelaColuna('Nome'),
        TabelaColuna::make('E-mail'),
    ])
);

$header->addRow(
    TabelaLinha::make([
        (new TabelaColuna())->content('ID'),
        new TabelaColuna('Nome'),
        TabelaColuna::make('E-mail'),
    ])
);

$tabela = new Tabela();
$tabela->header($header);
// echo $tabela->toHtml(); // <table></table>
// echo $tabela; // <table></table>

echo $tabela->toHtml(); // <table></table>
