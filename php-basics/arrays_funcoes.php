<!-- 11. Crie um array com 5 cores e exiba todas elas usando um
loop.
12. Faça um array associativo com nome e idade de 3 pessoas
e exiba na tela.
13. Crie uma função que recebe dois números como
parâmetros e retorna a soma.
14. Faça uma função que recebe um array de números e
retorna a média dos valores.
15. Crie uma função que recebe uma string e retorna a mesma
string em maiúsculas. -->

<?php 

    //11
    echo 'Cores: ';
    $cores = array('vermelho, ', 'verde, ', 'azul, ', 'preto, ', 'lilas<br>');
    
    for ($contador = 0; $contador < sizeof($cores); $contador++){
    echo $cores [$contador];
}

    //12
    echo '<br>Array Assossiativo:';
    $pessoas = ["<br>Arthur" => 25, "Raul" => 96, "PedroTomate" => 22];

    foreach ($pessoas as $nome => $idade) {
    echo "$nome: $idade anos<br>";
    }

    //13
    function soma($num1, $num2) {

        $resultado = $num1 + $num2;

        echo 'O resultado e: ' . $resultado;
    }

    echo '<br>Funcao soma: <br>';
    soma(1, 2);

    //14
    $array = array(4,8);

    function media($array) {
        $soma = array_sum($array);
        $quantidade = count($array);
        $media = $soma / $quantidade;
        return $media;
    }
        echo '<br>Media: <br>';
        echo media($array);

    //15
    $string = "Ola, mundo!";

    function maiusculo($string) {
        $maiusculo_tropa = strtoupper($string);
        return $maiusculo_tropa;
    }

        echo '<br>String: <br>';
        echo maiusculo($string);
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
    
</body>
</html>