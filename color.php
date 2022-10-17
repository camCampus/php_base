<?php
//$X = random_int(1,30);
//$Y = random_int(1,30);
//$Z = random_int(1,30);
//
//function add(int $a, int $b){
//    return $a + $b;
//}
//function mul(int $val, int $c){
//    return $val * $c;
//}
//
//$add = add($X,$Y);
//echo mul($add, $Z);

//$val = "retroviseur";
//
//function word(string $w)
//{
//    for ($i = 0; $i < strlen($w); $i++) {
//        echo $w[$i];
//        echo "\n";
//    }
//    echo "------------------'\n'";
//    $rev = strrev($w);
//    for ($i = 0; $i < strlen($w); $i++) {
//        echo strrev($rev[$i]);
//        echo "\n";
//    }
//}
//
//function voy(string $w)
//{
//    $voy = "aeiouy";
//    $count = 0;
//    $stock = "";
//
//    while ($count < strlen($w)) {
//        $i = 0;
//        while (true) {
//            if($w[$count] != $voy[$i]){
//                $i++;
//            }
//            if($w[$count] == $voy[$i] ){
//                break;
//            }
//            if($i == strlen($voy) -1){
//                echo $w[$count];
//                echo "\n";
//                break;
//            }
//        }
//        $count++;
//    }
//}
//
////word($val);
//voy($val);

$mois = array(
    "Janvier" => 31,
    "Fevier" => 29,
    "Mars" => 31,
    "Avril" => 30,
    "Mai" => 31,
    "Juin" => 30,
    "Juillet" => 31,
    "Aout" => 31,
    "Septembre" => 30,
    "Octobre" => 31,
    "Novembre" => 30,
    "Decembre" => 31,
);

function getMonth(array $board){
    foreach ($board as $key => $val){
        echo "Le mois de " .$key. " a " .$val. "\n";
    }
}
getMonth($mois);