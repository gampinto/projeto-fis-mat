<?php

function pontoMedio(array $vetores): array {

    $quantidade = count($vetores);
    if ($quantidade < 2) {
        throw new Exception("É necessário pelo menos dois vetores.");
    }

    $dim = count($vetores[0]);

    foreach ($vetores as $v) {
        if (count($v) !== $dim) {
            throw new Exception("Todos os vetores devem ter a mesma dimensão.");
        }
    }

    $soma = array_fill(0, $dim, 0);

    foreach ($vetores as $v) {
        for ($i = 0; $i < $dim; $i++) {
            $soma[$i] += $v[$i];
        }
    }

    $resultado = [];
    for ($i = 0; $i < $dim; $i++) {
        $resultado[$i] = $soma[$i] / $quantidade;
    }

    return array_map('decimalParaFracao', $resultado);

}
function decimalParaFracao($valor, $tolerancia = 1e-9) {
    if (floor($valor) == $valor) {
        return (string) $valor;
    }

    $negativo = $valor < 0;
    $valor = abs($valor);

    $h1 = 1; $h2 = 0;
    $k1 = 0; $k2 = 1;
    $b = $valor;

    do {
        $a = floor($b);
        $aux = $h1;
        $h1 = $a * $h1 + $h2;
        $h2 = $aux;

        $aux = $k1;
        $k1 = $a * $k1 + $k2;
        $k2 = $aux;

        $b = 1 / ($b - $a);

    } while (abs($valor - $h1 / $k1) > $valor * $tolerancia);

    return ($negativo ? "-" : "") . "$h1/$k1";
}
