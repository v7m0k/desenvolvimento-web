<!-- Crie um formulário que tenha 3 entradas, dia, mês e ano de nascimento.
O formulário deve enviar os dados para um arquivo php. Neste arquivo php, crie variáveis $diaNascimento, $mesNascimento e $anoNascimento que armazenará o DIA, MÊS e ANO em que você nasceu;

Crie variáveis $diaAtual, $mesAtual e $anoAtual que armazenará a data de hoje (20/02/2025);

Calcule quantos dias de vida você já viveu e imprima na página em um título (h1);
◦ Esse título deve ter fonte 26pt e cor vermelha. -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Arthur e Pedro</title>
</head>
<body>

    <!-- form 1 -->
    <form action="" method="get">
        <div class="container">
            <div class="form_nasc">
                <label for="dia_nasc">Digite o dia que vc nasceu:</label>
                <input type="number" name="dia_nasc" id="dia_nascimento">
            </div>

            <div class="form_nasc">
                <label for="mes_nasc">Digite o mês que vc nasceu:</label>
                <input type="number" name="mes_nasc" id="mes_nascimento">
            </div>

            <div class="form_idade">
                <label for="ano_nasc">Digite o ano que vc nasceu:</label>
                <input type="number" name="ano_nasc" id="ano_nascimento">
            </div>
            <div class="botao">
                <input type="submit" value="Enviar">
            </div>
        </div>
    </form>
    
</body>
</html>

<?php
    echo "<h1>PHP</h1>";

    require_once("folha.php");
?>