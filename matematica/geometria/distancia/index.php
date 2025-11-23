<?php
require_once __DIR__ . "/distancia.php";

$resultado = null;
$erro = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $vetorA = array_map('floatval', explode(',', $_POST['vetorA']));
        $vetorB = array_map('floatval', explode(',', $_POST['vetorB']));

        $resultado = distanciaVetores($vetorA, $vetorB);
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Distância entre Vetores</title>
    <link rel="stylesheet" href="../../estilos.css">
</head>
<body>

<h1>Distância entre Vetores</h1>

<form method="POST">
    <label>Vetor A (separado por vírgulas):</label>
    <input type="text" name="vetorA" placeholder="Ex: 1,2,3">

    <label>Vetor B (separado por vírgulas):</label>
    <input type="text" name="vetorB" placeholder="Ex: 4,5,6">

    <button type="submit">Calcular</button>
</form>

<?php if ($resultado !== null): ?>
    <p><strong>Resultado:</strong> <?= $resultado ?></p>
<?php endif; ?>

<?php if ($erro !== null): ?>
    <p style="color:red;"><strong>Erro:</strong> <?= $erro ?></p>
<?php endif; ?>

<a href="../index.php" class="voltar">Voltar</a>

</body>
</html>
