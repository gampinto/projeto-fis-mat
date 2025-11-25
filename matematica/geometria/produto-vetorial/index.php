<?php ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Produto Vetorial</title>
    <link rel="stylesheet" href="../../estilos.css">
    <link rel="stylesheet" href="css/produto-vetorial.css">
</head>
<body>

<h1>Produto Vetorial</h1>

<form action="produto-vetorial.php" method="POST">
    <label>Vetor A (separe por vírgula):</label>
    <input type="text" name="vetorA" placeholder="Ex: 1, 2, 3" required>

    <label>Vetor B (separe por vírgula):</label>
    <input type="text" name="vetorB" placeholder="Ex: 4, 5, 6" required>

    <button type="submit">Calcular</button>
</form>

<a href="../index.php" class="voltar">Voltar</a>

</body>
</html>
