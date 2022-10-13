<?php
$X = random_int(1,30);
$Y = random_int(1,30);
$Z = random_int(1,30);

function add(int $a, int $b){
    return $a + $b;
}
function mul(int $val, int $c){
    return $val * $c;
}

$add = add($X,$Y);
echo mul($add, $Z);

