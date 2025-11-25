<?php

function produtoVetorial(array $A, array $B): array {
    return [
        $A[1] * $B[2] - $A[2] * $B[1],
        $A[2] * $B[0] - $A[0] * $B[2],
        $A[0] * $B[1] - $A[1] * $B[0]
    ];
}

function montarMatriz(array $A, array $B): string {
    $a0 = htmlspecialchars((string)$A[0]);
    $a1 = htmlspecialchars((string)$A[1]);
    $a2 = htmlspecialchars((string)$A[2]);
    $b0 = htmlspecialchars((string)$B[0]);
    $b1 = htmlspecialchars((string)$B[1]);
    $b2 = htmlspecialchars((string)$B[2]);

    return "
        <pre class='det-matrix'>
|  i    j    k  |
| {$a0}  {$a1}  {$a2} |
| {$b0}  {$b1}  {$b2} |
        </pre>
    ";
}

$erro = null;
$resultado = null;
$matriz = null;
$passosHTML = null;
$vetA_raw = $_POST['vetorA'] ?? '';
$vetB_raw = $_POST['vetorB'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vetA_raw = trim($vetA_raw);
    $vetB_raw = trim($vetB_raw);

    try {
        if ($vetA_raw === '' || $vetB_raw === '') {
            throw new Exception("Preencha os dois vetores (Ex: 1,2,3).");
        }

        $vetA = array_map('floatval', array_map('trim', explode(',', $vetA_raw)));
        $vetB = array_map('floatval', array_map('trim', explode(',', $vetB_raw)));

        if (count($vetA) !== 3 || count($vetB) !== 3) {
            throw new Exception("Cada vetor deve ter exatamente 3 valores (Ex: 1,2,3).");
        }

        $resultado = produtoVetorial($vetA, $vetB);
        $matriz = montarMatriz($vetA, $vetB);

        $i_comp = ($vetA[1] * $vetB[2]) - ($vetA[2] * $vetB[1]);
        $j_comp = ($vetA[2] * $vetB[0]) - ($vetA[0] * $vetB[2]);
        $k_comp = ($vetA[0] * $vetB[1]) - ($vetA[1] * $vetB[0]);

        $passosHTML = "
            <div class='passos'>
                <p><strong>Matriz (determinante):</strong></p>
                {$matriz}
                <p><strong>Expansão:</strong></p>
                <pre class='expansion'>
i·({$vetA[1]}·{$vetB[2]} − {$vetA[2]}·{$vetB[1]}) −
j·({$vetA[0]}·{$vetB[2]} − {$vetA[2]}·{$vetB[0]}) +
k·({$vetA[0]}·{$vetB[1]} − {$vetA[1]}·{$vetB[0]})
                </pre>
                <p><strong>Cálculos:</strong></p>
                <ul>
                    <li>i = ({$vetA[1]} × {$vetB[2]}) − ({$vetA[2]} × {$vetB[1]}) = {$i_comp}</li>
                    <li>j = ({$vetA[2]} × {$vetB[0]}) − ({$vetA[0]} × {$vetB[2]}) = {$j_comp}</li>
                    <li>k = ({$vetA[0]} × {$vetB[1]}) − ({$vetA[1]} × {$vetB[0]}) = {$k_comp}</li>
                </ul>
            </div>
        ";

    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Produto Vetorial — Resultado</title>

<link rel="stylesheet" href="../../estilos.css">

<link rel="stylesheet" href="css/produto-vetorial.css">

<style>
.det-matrix { font-family: monospace; text-align:center; }
.expansion { background:#f8f8f8; padding:8px; border-radius:6px; max-width:720px; margin:8px auto; }
.passos { max-width:760px; margin:10px auto; }
#passos { display:none; }
.btn-toggle { display:inline-block; background:#0077cc; color:#fff; padding:6px 12px; border-radius:6px; cursor:pointer; margin-top:10px; }
</style>

</head>
<body>

<h1>Produto Vetorial (3D)</h1>

<form method="POST" action="">
    <label>Vetor A (Ex: 1,2,3)</label>
    <input type="text" name="vetorA" placeholder="1,2,3" value="<?= htmlspecialchars($vetA_raw) ?>">

    <label>Vetor B (Ex: 4,5,6)</label>
    <input type="text" name="vetorB" placeholder="4,5,6" value="<?= htmlspecialchars($vetB_raw) ?>">

    <button type="submit">Calcular</button>
</form>

<?php if ($erro): ?>
    <p style="color:red; text-align:center;"><strong><?= htmlspecialchars($erro) ?></strong></p>
<?php endif; ?>

<?php if ($resultado): ?>
    <p class="resultado" style="text-align:center; margin-top:12px;">
        <strong>Resultado:</strong> (<?= htmlspecialchars($resultado[0]) ?>, <?= htmlspecialchars($resultado[1]) ?>, <?= htmlspecialchars($resultado[2]) ?>)
    </p>

    <div class="btn-toggle" onclick="togglePassos()">Mostrar / Ocultar Passo a Passo</div>

    <div id="passos">
        <?= $passosHTML ?>
    </div>
<?php endif; ?>

<script>
function togglePassos(){
    const el = document.getElementById('passos');
    if (!el) return;
    el.style.display = (el.style.display === 'block') ? 'none' : 'block';
}
</script>
<a href="index.php" class="voltar">Voltar</a>

<script src="js/produto-vetorial.js"></script>
</body>
</html>
