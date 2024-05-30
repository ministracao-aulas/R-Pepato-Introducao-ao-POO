<?php

require __DIR__ . '/Funcionario.php';

$newLine = function () {
    echo PHP_EOL . str_repeat('-', 60) . PHP_EOL;
};

$rodrigo = new Funcionario('Rodrigo');

echo $rodrigo->getName() . PHP_EOL;

$newLine();
$rodrigo->setName('Rodrigo Pepato');
echo $rodrigo->getName() . PHP_EOL;

$newLine();
echo 'Nome da classe: ' . $rodrigo->className() . PHP_EOL;
echo 'Nome da estático: ' . Funcionario::className() . PHP_EOL;

$newLine();
echo 'Hora atual: ' . $rodrigo->horaAtual() . PHP_EOL;
echo 'Hora atual estático: ' . Funcionario::horaAtual() . PHP_EOL;
