<!-- 6. Crie um código que verifica se um numero é positivo, negativo
ou zero.
7. Faça um script que verifica se um numero é par ou ímpar.
8. Use um switch-case para exibir o nome do dia da semana com
base em um numero de 1 a 7.
9. Crie um loop for que exiba os numeros de 1 a 10.
10. Faça um loop while que exiba os numeros de 10 a 1. -->

<?php 

    //6
    $num = -1;

    if ($num > 0) {
        echo 'O numero e positivo.';
    }
    elseif ($num == 0){
        echo 'O numero e nulo';
    }
    else {
        echo 'O numero e negativo';
    }

    //7
    $valor = 1;

    if($valor % 2 == 0) {
        echo '<br><br>O numero ' .$valor . ' e par.';
    }
    else {
        echo '<br><br>O numero ' .$valor . ' e impar';
    }

    //8
    $dia_semana = 1;

    switch ($dia_semana) {
        case 1:
            echo '<br><br>Domingo';
            break;
        case 2:
            echo '<br><br>Segunda';
            break;
        case 3:
            echo '<br><br>Terca';
            break;
        case 4:
            echo '<br><br>Quarta';
            break;
        case 4:
            echo '<br><br>Quinta';
            break;
        case 5:
            echo '<br><br>Sexta';
            break;
        case 6:
            echo '<br><br>Sabado';
            break;
    }

    //9
    echo '<br><br>Loop: ';
    for ($i = 1; $i <= 10; $i++) {
        echo $i;
    }

    //10
    echo '<br><br>Loop While: ';
    $numero = 10;

    while ($numero >= 1) {
        echo $numero;
        $numero--;
    }
?>