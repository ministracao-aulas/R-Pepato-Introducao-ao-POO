<?php

require __DIR__ . '/Player.php';

$newLine = function () {
    echo PHP_EOL . str_repeat('-', 40) . PHP_EOL;
};

$rodrigo = new Player('Rodrigo');
$tiago = new Player('Tiago');

echo $rodrigo->getName() . PHP_EOL;

$showScore = function (array $players) use ($newLine) {
    $newLine();

    echo 'SCORE:' . PHP_EOL;

    foreach($players as $player) {
        echo "{$player->getName()}: {$player->getScore()}" . PHP_EOL;
    }
};

$shuffle = function (array $players) use ($newLine) {
    $numbers = [];

    foreach($players as $key => $player) {
        $player->renewNumber();
        $newKey = $player->getNumber();
        $players[$newKey] = $player;
        unset($players[$key]);
    }

    foreach($players as $player) {
        $numbers[] = $player->getNumber();
    }

    $values = array_values($numbers);

    $empate = $values[0] === $values[1];

    if ($empate) {
        echo PHP_EOL . 'EMPATE!!!' . PHP_EOL;
        return;
    }

    asort($values);

    $vencedor = $values[array_key_last($values ?? [])];

    $playerVencedor = $players[$vencedor] ?? null;

    if (!$playerVencedor) {
        return;
    }

    $playerVencedor?->incrementScore();

    $newLine();
    echo "Maior número: {$vencedor}" . PHP_EOL;
    echo "Vencedor: {$playerVencedor?->getName()}" . PHP_EOL;
    echo "Vencedor score: {$playerVencedor?->getScore()}" . PHP_EOL;
};

$players = [
    $rodrigo,
    $tiago,
];

// $newLine();
// var_export($players);
$showScore($players);
$shuffle($players);
$shuffle($players);
$shuffle($players);
$shuffle($players);
$shuffle($players);
$shuffle($players);
$shuffle($players);
$shuffle($players);
$shuffle($players);
$showScore($players);

$newLine();
