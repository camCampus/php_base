<?php

$rand = random_int(1, 3);
$rand2 = random_int(1, 3);

$first_color = match ($rand) {
    1 => "bleu\n",
    2 => "jaune\n",
    3 => "rouge\n"
};
echo $first_color;
$second_color = match ($rand2) {
    1 => "bleu\n",
    2 => "jaune\n",
    3 => "rouge\n"
};
echo $second_color;

if ($first_color == $second_color) {
    echo $first_color;

} elseif ($first_color == "jaune") {
    echo $mix_color = match ($second_color) {
        "bleu" => "vert",
        "rouge" => "orange",
    };

} elseif ($first_color == "bleu") {
    echo $mix_color = match ($second_color) {
        "jaune" => "vert",
        "rouge" => "violet",
    };

} elseif ($first_color == "rouge") {

    echo $mix_color = match ($second_color) {
        "jaune" => "orange",
        "bleu" => "violet",
    };

}


