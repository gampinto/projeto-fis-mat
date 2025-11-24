<?php
require_once __DIR__ . "/pontomedio.php";

$erro = null;
$resultado = null;
$vetoresInseridos = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $qtd = intval($_POST['quantidade']);

        if ($qtd < 2) {
            throw new Exception("Informe pelo menos dois vetores.");
        }

        for ($i = 1; $i <= $qtd; $i++) {
            if (empty($_POST["vetor$i"])) {
                throw new Exception("Preencha todos os vetores.");
            }

            $vetoresInseridos[] = array_map('floatval', explode(',', $_POST["vetor$i"]));
        }

        $resultado = pontoMedio($vetoresInseridos);

    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ponto Médio</title>
    <link rel="stylesheet" href="../../estilos.css">
</head>
<body>

<h1>Ponto Médio</h1>

<form method="POST">

    <label>Quantos vetores serão usados?</label>
    <input type="number" name="quantidade" min="2" value="<?= $_POST['quantidade'] ?? '' ?>" required>
    <button type="submit">Confirmar</button>

</form>

<?php if (isset($_POST['quantidade']) && $resultado === null): ?>


    <form method="POST">
        <input type="hidden" name="quantidade" value="<?= $_POST['quantidade'] ?>">

        <?php for ($i = 1; $i <= $_POST['quantidade']; $i++): ?>
            <label>Vetor <?= $i ?> (separado por vírgulas):</label>
            <input 
    type="text" 
    name="vetor<?= $i ?>" 
    value="<?= $_POST["vetor$i"] ?? '' ?>" 
    placeholder="Ex: 1,2,3"
>

        <?php endfor; ?>

        <button type="submit">Calcular</button>
    </form>

<?php endif; ?>

<?php if ($resultado): ?>
    <p class="resultado">
        O ponto médio entre 
        <?php foreach ($vetoresInseridos as $v): ?>
            (<?= implode(',', $v) ?>)
        <?php endforeach; ?>
        é 
        <strong>(<?= implode(', ', $resultado) ?>)</strong>.
    </p>
<?php endif; ?>

<?php if ($erro): ?>
    <p style="color: red; text-align:center;"><strong><?= $erro ?></strong></p>
<?php endif; ?>

<a href="../index.php" class="voltar">Voltar</a>

</body>
</html>
