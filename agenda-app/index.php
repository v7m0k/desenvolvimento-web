
<?php
    include_once("agenda.php")
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agenda</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-item">
                <img src="arthur.jpg" alt="Arthur">
                <span class="nav-text">Arthur Henrique (0080/24)</span>
            </div>
            <div class="nav-item">
                <img src="pedro.jpg" alt="Pedro Ferrari">
                <span class="nav-text">Pedro Ferrari (0761/24)</span>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="titulo">
            <h2>Gerenciador de Agenda</h2>
        </div>

    <div class="formulario">
        <form method="post">
            <div class="nome">
                <label>Nome:</label>
                <input type="text" name="nome" required>
            </div>
            <div class="idade">
                <label>Idade:</label>
                <input type="number" name="idade" required>
            </div>
            <div class="altura">
                <label>Altura:</label>
                <input type="text" name="altura" required>
            </div>
            <div class="botao1">
                <button type="submit" name="add">Adicionar Pessoa</button>
            </div>
            <div class="botao2">
                <button type="submit" name="remove">Remover Pessoa</button>
            </div>
        </form>
    </div>

    <div class="texto_lista">
        <h3>Lista de Pessoas</h3>
    </div>

        <?php $agenda->imprimeAgenda(); ?>
    </div>
</body>
</html>