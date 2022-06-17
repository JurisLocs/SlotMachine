<?php

$board = new stdClass();
$board->fields = [];


//simboli pa smuko
$emojis = [
    "\u{1F347}",
    "\u{1F349}",
    "\u{1F34B}",
    "\u{1F34D}",
    "\u{1F352}",
    "\u{1F4B0}",
    "\u{1F4AF}",
    "\u{1F48E}",
];
$coef=1;
foreach ($emojis as $emoji){
    echo "$emoji multiplier x $coef". PHP_EOL;
    $coef += 0.1;
}

for($i = 0; $i<15;$i++){
    $board->fields[$i] = rand(0,7);
}

function display_board(stdClass $board, array $emoji)
{
    $counter = 0;
    foreach ($board->fields as $field) {
        if ($counter == 5) {
            echo PHP_EOL;
            $counter = 0;
        }
        echo " " . $emoji[$field] . " | ";
        $counter++;
    }
    echo PHP_EOL;
}
function roll(stdClass $board){
    for($i = 0; $i<15;$i++){
        $board->fields[$i] = rand(0,7);
    }
}
$bet=0;
$lost = 0;
$won = 0;
$profit = 0;
while($profit > -100){
    $insert = (int)readline("Place your bet: \n");
    switch ($insert){
        case 10:
            $bet = 0.10;
            $lost += 0.10;
            echo "You bet 0.10$" . PHP_EOL;
            break;
        case 20:
            $bet = 0.20;
            $lost += 0.20;
            echo "You bet 0.20$". PHP_EOL;
            break;
        case 50:
            $bet = 0.50;
            $lost += 0.50;
            echo "You bet 0.50$". PHP_EOL;
            break;
        case 100:
            $bet = 1.00;
            $lost += 1.00;
            echo "You bet 1.00$". PHP_EOL;
            break;
        default:
            echo "Not a valid bet!". PHP_EOL;
    }
    roll($board);
    display_board($board,$emojis);
    $won += win($board,$bet);
    echo "You lost : $lost $" . PHP_EOL;
    echo "You won : $won $" . PHP_EOL;

}
echo "You lost enough today :) " . PHP_EOL;

function win(stdClass $board, float $bet):float{
    $x = $board->fields;
    foreach ($x as $key=>$value){
        $x[$key] = 1 + ($value / 10);
    }
    $win = 0;
    if($x[0] == $x[6] && $x[0] == $x[12] && $x[0] == $x[8] && $x[0] == $x[4]){
        $win += $bet * 400 * $x[0];
    }
    if ($x[10] == $x[6] && $x[10] == $x[8] && $x[10] == $x[2] && $x[10] == $x[14]){
        $win += $bet * 400 * $x[10];
    }
    // Zig zag win

    // first row
    if($x[0] == $x[1] && $x[0] == $x[2] && $x[0] == $x[3] && $x[0] == $x[4]){
        $win += $bet * 100 * $x[0];

        // 5 row win

    }else{

        // 4 row win
        if($x[0] == $x[1] && $x[0] == $x[2] && $x[0] == $x[3]){
            $win += $bet * 50 * $x[0];
        }
        if($x[1] == $x[2] && $x[2] == $x[3] && $x[3] == $x[4]){
            $win += $bet * 50 * $x[0];
        }

        // 3 row win

        else{
            if($x[0] == $x[1] && $x[0] == $x[2]){
                $win += $bet * 10 * $x[0];
            }
            if($x[1] == $x[2] && $x[2] == $x[3]){
                $win += $bet * 10 * $x[1];
            }
            if($x[2] == $x[3] && $x[3] == $x[4]){
                $win += $bet * 10 * $x[2];
            }
        }
    }


    if($x[5] == $x[6] && $x[5] == $x[7] && $x[5] == $x[8] && $x[5] == $x[9]){
        $win += $bet * 100 * $x[5];
    }else{
        if($x[5] == $x[6] && $x[5] == $x[7] && $x[5] == $x[8]){
            $win += $bet * 50 * $x[5];
        }
        if($x[6] == $x[7] && $x[7] == $x[8] && $x[8] == $x[9]){
            $win += $bet * 50 * $x[6];
        }else{
            if($x[5] == $x[6] && $x[6] == $x[7]){
                $win += $bet * 10 * $x[5];
            }
            if($x[6] == $x[7] && $x[7] == $x[8]){
                $win += $bet * 10 * $x[6];
            }
            if($x[7] == $x[8] && $x[8] == $x[9]){
                $win += $bet * 10 * $x[7];
            }
        }
    }



    if($x[10] == $x[11] && $x[10] == $x[12] && $x[10] == $x[13] && $x[10] == $x[14]){
        $win += $bet * 100 * $x[10];
    }else{
        if($x[10] == $x[11] && $x[10] == $x[12] && $x[10] == $x[13]){
            $win += $bet * 100 * $x[10];
        }
        if($x[11] == $x[12] && $x[12] == $x[13] && $x[13] == $x[14]){
            $win += $bet * 100 * $x[11];
        }else{
            if($x[10] == $x[11] && $x[10] == $x[12]){
                $win += $bet * 10 * $x[10];
            }
            if($x[11] == $x[12] && $x[12] == $x[13]){
                $win += $bet * 10 * $x[11];
            }
            if($x[12] == $x[13] && $x[13] == $x[14]){
                $win += $bet * 10 * $x[12];
            }
        }
    }
    return $win;
}

