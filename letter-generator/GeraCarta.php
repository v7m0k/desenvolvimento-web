<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // dados do form
    $remetente = trim($_POST['remetente']);
    $destinatario = trim($_POST['destinatario']);
    $endereco_remetente = trim($_POST['endereco_remetente']);
    $endereco_destinatario = trim($_POST['endereco_destinatario']);
    $data = trim($_POST['data']);
    $assunto = trim($_POST['assunto']);
    $conteudo = trim($_POST['conteudo']);

    // data
    $data_formatada = date("Y-m-d", strtotime($data));

    // tira caracter especial
    $nome_arquivo = preg_replace("/[^a-zA-Z0-9-_]/", "", $remetente);

    // nome arquivo downlkoad
    $arquivo = "{$data_formatada}_{$nome_arquivo}.txt";

    // conteudo carta
    $carta = "==========================================\n";
    $carta .= "           CARTA GERADA AUTOMATICAMENTE         \n";
    $carta .= "==========================================\n\n";
    $carta .= "De: $remetente\n";
    $carta .= "Endereço: $endereco_remetente\n\n";
    $carta .= "Para: $destinatario\n";
    $carta .= "Endereço: $endereco_destinatario\n\n";
    $carta .= "Data: $data\n";
    $carta .= "Assunto: $assunto\n";
    $carta .= "------------------------------------------\n";
    $carta .= "$conteudo\n";
    $carta .= "------------------------------------------\n";
    $carta .= "Atenciosamente,\n";
    $carta .= "$remetente\n";

    // salva a carta no arquivo
    if (file_put_contents($arquivo, $carta)) {
        echo "<div class='txt'><p>Carta gerada e salva com sucesso!</div>";
        echo "<div class='txt-but'><a href='ListaCartas.php' class='botao'>Ver Cartas</a></p></div>";
    } else {
        echo "<div class='txt'><p>Erro ao salvar a carta.</p></div>";
    }
} else {
    echo "<div class='txt'><p>Erro: acesso inválido.</p></div>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="writing.png">
    <title>Gerador de Cartas</title>
</head>
<body>

</body>
</html>