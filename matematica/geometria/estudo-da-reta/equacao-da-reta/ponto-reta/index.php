<?php
$resultado = "";
$passo_a_passo = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $a = floatval($_POST["a"]);
    $b = floatval($_POST["b"]);
    $c = floatval($_POST["c"]);
    $x = floatval($_POST["x"]);
    $y = floatval($_POST["y"]);

    $valor = $a * $x + $b * $y + $c;

    if ($valor == 0) {
        $resultado = "O ponto ($x, $y) pertence à reta.";
    } else {
        $resultado = "O ponto ($x, $y) NÃO pertence à reta.";
    }

    $passo_a_passo = "
        <p><strong>Substituindo em:</strong> ax + by + c = 0</p>
        <p>$a($x) + $b($y) + $c = $valor</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ponto Pertence à Reta</title>

    <link rel="stylesheet" href="../../../../estilos.css">


    <style>
        #btn-explicacao {
            display: block;
            margin: 20px auto;
            background: #0077cc;
            color: #fff;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            width: 230px;
            text-align: center;
        }

        #explicacao-box {
            display: none;
            background: #fff;
            max-width: 450px;
            margin: 20px auto;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.25);
        }
    </style>
</head>
<body>

<h1>Verificar se um ponto pertence à reta</h1>

<p style="text-align:center; max-width:480px; margin:10px auto;">
    Determine os valores <strong>A, B e C</strong> para uma reta <strong>ax + by + c = 0</strong>,  
    e o ponto <strong>(x, y)</strong> que deseja verificar.
</p>

<div id="btn-explicacao">Como funciona?</div>

<div id="explicacao-box">
    <h3>Como funciona?</h3>
    <p>A equação geral da reta no plano é:</p>
    <p><strong>ax + by + c = 0</strong></p>

    <p>Para verificar se um ponto pertence à reta, basta substituir suas coordenadas  
    no lugar de x e y. Se a expressão resultar em <strong>0</strong>, o ponto pertence;  
    se resultar em outro número, não pertence.</p>
</div>

<form method="POST">
    <label>A:</label>
    <input type="text" name="a" required>

    <label>B:</label>
    <input type="text" name="b" required>

    <label>C:</label>
    <input type="text" name="c" required>

    <label>x do ponto:</label>
    <input type="text" name="x" required>

    <label>y do ponto:</label>
    <input type="text" name="y" required>

    <button type="submit">Calcular</button>
</form>

<?php if ($resultado): ?>
    <div class="resultado">
        <p><?= $resultado ?></p>
        <div><?= $passo_a_passo ?></div>
    </div>
<?php endif; ?>

<a href="../index.php" class="voltar">Voltar</a>
<script src="explicacao-ponto-reta.js"></script>


</body>
</html>
