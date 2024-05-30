<?php

require __DIR__ . '/Pessoa.php';

$newLine = function () {
    echo PHP_EOL . str_repeat('-', 60) . PHP_EOL;
};

$rodrigo = new Pessoa('Rodrigo');

echo $rodrigo->getName() . PHP_EOL;

$newLine();

$rodrigo->setName('Rodrigo Pepato');
echo $rodrigo->getName() . PHP_EOL;

$newLine();
