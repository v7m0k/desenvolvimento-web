<?php
// lista carta gerada
$arquivos = glob("*.txt");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="writing.png">
    <title>Lista de Cartas</title>
</head>
<body>
    <div class="container">
        <div class="titulo_cg">
            <h1>Cartas Geradas</h1>
        </div>

    <a href="index.html" class="botao">Voltar ao Formulário</a>
    <br><br>

    <?php if (count($arquivos) > 0): ?>
        <ul>
            <?php foreach ($arquivos as $arquivo): ?>
                <li>
                    <a href="visualizaCarta.php?arquivo=<?php echo urlencode($arquivo); ?>">
                        <?php echo htmlspecialchars($arquivo); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhuma carta encontrada.</p>
    <?php endif; ?>

    </div>
</body>
</html>
