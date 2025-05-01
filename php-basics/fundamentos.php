<!-- Crie uma variável para armazenar seu nome e exiba na tela.
2. Declare duas variáveis numéricas e exiba a soma delas.
3. Crie uma variável booleana e exiba seu valor na tela.
4. Concatene duas strings e exiba o resultado.
5. Declare uma constante e exiba seu valor. -->

<?php 

    //1
    $nome = 'arthur';

    echo 'Seu nome é: '.$nome . "\n";

    //2
    $num1 = 10;
    $num2 = 5;

    $soma = $num1 + $num2;

    echo '<br><br>A soma dos dois valores é: ' .$soma;

    //3
    $booleana = true;

    echo '<br><br>Variavel booleana = ' .$booleana;

    //4
    $a = 'Eai ';
    $b = $a . 'tropa!';

    echo '<br><br>' .$b;

    //5
    const nome_aluno = 'Arthur';
    echo '<br><br>' . nome_aluno;

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