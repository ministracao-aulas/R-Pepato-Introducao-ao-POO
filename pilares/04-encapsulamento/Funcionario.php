<?php


require __DIR__ . '/Pessoa.php';

class Funcionario extends Pessoa
{
    public static function horaAtual(): string
    {
        // $name = $this->getName();
        return date('c');
    }
}
