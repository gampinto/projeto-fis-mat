<?php
$resultado = "";
$passo = "";

if (isset($_POST['gerar'])) {

    $x1 = floatval($_POST['x1']);
    $y1 = floatval($_POST['y1']);
    $x2 = floatval($_POST['x2']);
    $y2 = floatval($_POST['y2']);

    $a = $y1 - $y2;
    $b = $x2 - $x1;
    $c = $x1*$y2 - $x2*$y1;

    $resultado = "<strong>Equação:</strong> {$a}x + {$b}y + {$c} = 0";
    $passo = "
        A = y₁ - y₂ = {$y1} - {$y2} = {$a}<br>
        B = x₂ - x₁ = {$x2} - {$x1} = {$b}<br>
        C = x₁y₂ - x₂y₁ = {$x1}·{$y2} - {$x2}·{$y1} = {$c}
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reta por Dois Pontos</title>
    <link rel="stylesheet" href="../../../../estilos.css">
    <script src="../js/explicacao-reta-pontos.js"></script>
</head>
<body>

<h2>Gerar a equação da reta por dois pontos</h2>

<form method="POST">
    <label>x₁:</label><input type="number" step="any" name="x1" required><br>
    <label>y₁:</label><input type="number" step="any" name="y1" required><br>
    <label>x₂:</label><input type="number" step="any" name="x2" required><br>
    <label>y₂:</label><input type="number" step="any" name="y2" required><br>

    <button type="submit" name="gerar">Gerar</button>
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
        <h3>Como obter a equação da reta por dois pontos?</h3>
        <div id="texto-explicacao"></div>
    </div>
</div>

</body>
</html>
