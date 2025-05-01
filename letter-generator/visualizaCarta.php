<?php
if (isset($_GET['arquivo'])) {
    $arquivo = basename($_GET['arquivo']); // Evita possíveis ataques de diretório

    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
    } else {
        die("Arquivo não encontrado.");
    }
} else {
    die("Nenhum arquivo especificado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Carta</title>
</head>
<body>
    <h1>Conteúdo da Carta</h1>
    <a href="ListaCartas.php">Voltar</a>
    <br><br>
    <pre><?php echo htmlspecialchars($conteudo); ?></pre>
</body>
</html>
