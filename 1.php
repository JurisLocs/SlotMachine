<?php

//Kafijas aparāts

$coins = [
    1=>5,
    2=>5,
    5=>5,
    10=>5,
    20=>5,
    50=>5,
    100=>5
];

foreach ($coins as $coin=> $amount){
    echo "$coin ($amount)" . PHP_EOL;
}

$price = 225;

while($price > 0){
    $insert = readline("price left is $price $ insert coin: \n");
    switch ($insert){
        case 1:
            if($coins[1] != 0){
                $price -= 1;
                $coins[1]--;
            }else {
                echo "You have no 0.01 coins left! \n";
            }
            break;
        case 2:
            if($coins[2] != 0){
                $price -= 2;
                $coins[2]--;
            }else {
                echo "You have no 0.02 coins left! \n";
            }
            break;
        case 5:
            if($coins[5] != 0){
                $price -= 5;
                $coins[5]--;
            }else {
                echo "You have no 0.05 coins left! \n ";
            }
            break;
        case 10:
            if($coins[10] != 0){
                $price -= 10;
                $coins[10]--;
            }else {
                echo "You have no 0.10 coins left! \n";
            }
            break;
        case 20:
            if($coins[20] != 0){
                $price -= 20;
                $coins[20]--;
            }else {
                echo "You have no 0.20 coins left! \n";
            }
            break;
        case 50:
            if($coins[50] != 0){
                $price -= 50;
                $coins[50]--;
            }else {
                echo "You have no 0.50 coins left! \n";
            }
            break;
        case 100:
            if($coins[100] != 0){
                $price -= 100;
                $coins[100]--;
            }else {
                echo "You have no 1.00 coins left! \n";
            }
            break;
    }
}

if($price < 0 ){
    $price = $price * -1;
    while($price != 0 ){
        $change = getClosest($price, $coins);
        $price -= $change;
        echo "Here's your $change coin!" .PHP_EOL;
        $coins[$change]++;
    }
}
function getClosest($search, $arr) {
    $closest = null;
    foreach ($arr as $item => $price) {
        if ($closest === null || ($search-$item) >= 0) {
            $closest = $item;
        }
    }
    return $closest;
}