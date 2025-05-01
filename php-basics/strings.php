<!-- 16. Remova espaços extras de uma string.
17. Substitua todas as ocorrências da letra "a" por "@" em
uma string.
18. Verifique se uma palavra contém a letra "z".
19. Converta uma string para um array de palavras.
20. Exiba o comprimento de uma string fornecida pelo
usuário. -->

<?php 
    //16
    $string = '   teste, um   ';
    $string = trim($string);
    echo $string;
    
    //17
    $frase = '<br>ola tropa';
    $substituir = str_replace("a", "@", $frase);
    echo $substituir;

    //18
    $palavra = 'paralelepipedo';
    if (strpos($palavra, 'z') !== false) {
        echo '<br>A palavra: ' . $palavra . ' ';
        echo 'contém a letra z';
        } else {
            echo '<br>A palavra: ' . $palavra . ' ';
            echo 'não contém a letra z<br>';
        }

    //19
    $str = 'Ola, mundo';
    $ray = explode(' ', $str);
    print_r($ray);

    //20
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $texto = $_POST["texto"];
        $comprimento = strlen($texto);

        echo '<p class="container"> O comprimento da string é:' . $comprimento . '</p>';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Atividade</title>
</head>
<body>
    <div class="container">
        <div class="form">
            <form method="post">
                <div class="texto">
                    <label>Digite uma string:</label>
                </div>
                <div class="in">
                    <input type="text" name="texto">
                </div>
                <div class="butao">
                    <button type="submit">Calcular</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>