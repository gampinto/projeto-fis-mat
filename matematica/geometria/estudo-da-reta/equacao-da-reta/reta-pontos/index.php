<?php
$resultado = "";
$passo_a_passo = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $x1 = floatval($_POST["x1"]);
    $y1 = floatval($_POST["y1"]);
    $x2 = floatval($_POST["x2"]);
    $y2 = floatval($_POST["y2"]);

    $A = $y1 - $y2;
    $B = $x2 - $x1;
    $C = $x1 * $y2 - $x2 * $y1;

    $resultado = "A equação da reta é: <strong>$A·x + $B·y + $C = 0</strong>";

    $passo_a_passo = "
        <h3>Passo a passo:</h3>
        <p>A = y₁ − y₂ = $y1 − $y2 = <strong>$A</strong></p>
        <p>B = x₂ − x₁ = $x2 − $x1 = <strong>$B</strong></p>
        <p>C = x₁y₂ − x₂y₁ = ($x1 × $y2) − ($x2 × $y1) = <strong>$C</strong></p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reta por Dois Pontos</title>

    <link rel="stylesheet" href="../../../../estilos.css">

</head>
<body>

<h1>Gerar a reta que passa por dois pontos</h1>

<p style="text-align:center; max-width:480px; margin:10px auto;">
    Informe as coordenadas dos pontos <strong>A(x₁, y₁)</strong> e <strong>B(x₂, y₂)</strong>.
</p>

<div id="btn-explicacao">Como funciona?</div>

<div id="explicacao-box">
    <h3>Como funciona?</h3>

    <p>Duas coordenadas distintas <strong>A(x₁, y₁)</strong> e <strong>B(x₂, y₂)</strong> determinam uma única reta.</p>

    <p>A equação geral pode ser obtida usando:</p>

<pre>
A = y₁ − y₂
B = x₂ − x₁
C = x₁y₂ − x₂y₁
</pre>

    <p>A reta final fica:</p>
    <p class="destaque"><strong>A·x + B·y + C = 0</strong></p>
</div>

<form method="POST">
    <label>x₁:</label>
    <input type="text" name="x1" required>

    <label>y₁:</label>
    <input type="text" name="y1" required>

    <label>x₂:</label>
    <input type="text" name="x2" required>

    <label>y₂:</label>
    <input type="text" name="y2" required>

    <button type="submit">Calcular</button>
</form>

<?php if ($resultado): ?>
    <div class="resultado">
        <p><?= $resultado ?></p>
        <div><?= $passo_a_passo ?></div>
    </div>
<?php endif; ?>

<a href="../index.php" class="voltar">Voltar</a>

<script src="explicacao-reta-pontos.js"></script>

</body>
</html>
