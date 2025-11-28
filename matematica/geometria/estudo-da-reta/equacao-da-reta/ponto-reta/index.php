<?php
$resultado = "";
$passo = "";

if (isset($_POST['verificar'])) {

    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);
    $c = floatval($_POST['c']);
    $x = floatval($_POST['x']);
    $y = floatval($_POST['y']);

    $valor = $a*$x + $b*$y + $c;

    $passo = "
        Substituindo: {$a}·({$x}) + {$b}·({$y}) + {$c}<br>
        = {$valor}
    ";

    if ($valor == 0) {
        $resultado = "<span class='ok'>O ponto pertence à reta.</span>";
    } else {
        $resultado = "<span class='erro'>O ponto NÃO pertence à reta.</span>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ponto e Reta</title>
    <link rel="stylesheet" href="../../../../estilos.css">
    <script src="../js/explicacao-ponto-reta.js"></script>
</head>
<body>

<h2>Verificar se um ponto pertence à reta</h2>

<form method="POST">
    <label>A:</label><input type="number" step="any" name="a" required><br>
    <label>B:</label><input type="number" step="any" name="b" required><br>
    <label>C:</label><input type="number" step="any" name="c" required><br>
    <label>x:</label><input type="number" step="any" name="x" required><br>
    <label>y:</label><input type="number" step="any" name="y" required><br>

    <button type="submit" name="verificar">Verificar</button>
    <button type="button" onclick="mostrarExplicacao()">Como funciona?</button>
</form>

<div class="resultado">
    <?= $resultado ?>
</div>

<div class="passo">
    <?= $passo ?>
</div>

<a href="../index.php" class="voltar">Voltar</a>

<div id="popup-explicacao" class="popup">
    <div class="popup-conteudo">
        <span onclick="fecharPopup()" class="fechar">&times;</span>
        <h3>Como verificar se um ponto pertence à reta?</h3>
        <div id="texto-explicacao"></div>
    </div>
</div>

</body>
</html>
