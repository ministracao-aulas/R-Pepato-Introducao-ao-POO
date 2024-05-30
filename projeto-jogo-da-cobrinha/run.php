<?php

$newLine = function () {
    echo PHP_EOL . str_repeat('-', 40) . PHP_EOL;
};

$newEmptyLine = function (int $count = 1) {
    $count = $count >= 0 ? $count : 1;
    echo PHP_EOL . str_repeat(PHP_EOL, $count) . PHP_EOL;
};

$food = function () {
    echo '🍉';
};

$snake = function (int $size = 1, int $leftCount = 1) {
    $leftCount = $leftCount >= 0 ? $leftCount : 1;
    $size = $size > 0 ? $size : 1;
    echo str_repeat(' ', $leftCount) . str_repeat('=', $size) .'["]-<';
};

$score = 4;

// $newLine();
// $snake($score, 8);
// $food();
// $newEmptyLine(1);
// $snake($score + 5, 8);
// $newEmptyLine(15);
// $newLine();
// // 4x4

$width = 8;
$height = 16;

$fullSquare = $width * $height;

$whereIsFood = rand(1, $fullSquare);

// $square = PHP_EOL .' ---' . ' ---' . ' ---' . ' ---';
// $square .= PHP_EOL . '|   ' . '|   ' . '|   ' . '|   |';
// // $square .= PHP_EOL . ' ---' . ' ---' . ' ---' . ' ---';

// echo $square;
// echo $square;
// echo $square;
// echo $square;
// echo PHP_EOL .' ---' . ' ---' . ' ---' . ' ---';

$sqid = 1;
for ($i = 1; $i <= $height; $i++) {
    for ($i2 = 1; $i2 <= $width; $i2++) {
        $squareStr = $whereIsFood === $sqid ? '(:)' : $sqid;
        echo "|" . str_pad("{$squareStr}", 3, ' ');
        $sqid++;
    }
    echo '|' . PHP_EOL;
}
