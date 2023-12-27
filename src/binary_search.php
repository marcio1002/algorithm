<?php
require_once dirname(__DIR__, 1) . "/vendor/autoload.php";

use Algorithm\Helpers\Time;

$message = fn (array $numbers, int $index_item) => $index_item === false
    ? 'Item não encontrado'
    : "O valor \"{$numbers[$index_item]}\" está no índice \"$index_item\"" . PHP_EOL;

$message_duration = fn(string $duration, string $type) => "Busca por $type levou $duration segundos" . PHP_EOL;


function sequential_search(array $arr, string|int $search_item)
{
    foreach ($arr as $index => $item) {
        if ($item === $search_item) return (int) $index;
    }

    return false;
}

function binary_search(array $arr, string|int $search_item)
{
    $start = 0;
    $end = count($arr);


    while ($start <= $end) {
        $half = (int) floor(($start + $end) / 2);

        if ($arr[$half] === $search_item) return $half;


        if ($arr[$half] < $search_item)
            $start = $half + 1;
        else
            $end = $half;
    }

    return false;
}

$numbers = range(1, 3000000);
$time = new Time();

echo "Busca por binário:" . PHP_EOL;
$time->start();
$index_item = binary_search($numbers, 1000000);
$time->end();

echo $message($numbers, $index_item);
echo $message_duration($time->duration(), "binary_search"); 
echo PHP_EOL . PHP_EOL;


echo "Busca sequencial: " . PHP_EOL;
$time->start();
$index_item = sequential_search($numbers, 1000000);
$time->end();

echo $message($numbers, $index_item);
echo $message_duration($time->duration(), "sequential_search");