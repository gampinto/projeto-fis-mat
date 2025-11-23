<?php

function distanciaVetores(array $a, array $b): float {
    if (count($a) !== count($b)) {
        throw new Exception("Os vetores têm dimensões diferentes.");
    }

    $soma = 0;
    for ($i = 0; $i < count($a); $i++) {
        $soma += ($b[$i] - $a[$i]) ** 2;
    }

    return sqrt($soma);
}
