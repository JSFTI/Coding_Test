<?php

function printArray($arr){
  echo '[';
  for($i = 0; $i < count($arr); $i++){
    echo $arr[$i];

    if($i + 1 < count($arr)){
      echo ', ';
    }
  }

  echo ']';
}

echo "Filter: ";
$input_type = fopen("php://stdin","r");
$type = (int) trim(fgets($input_type));

$modValue = $type % 2;

$arr = [];

for($i = 0; $i < 12; $i++){
  $arr[] = rand(1, 99);
}

echo 'Print Array: ';
printArray($arr);

echo PHP_EOL;

echo 'Filter: ' . ($type === 1 ? 'ganjil' : 'genap') . PHP_EOL;

echo 'Print Array: ';

printArray(array_values(array_filter($arr, fn($x) => $x % 2 === $modValue)));

echo PHP_EOL;
?>