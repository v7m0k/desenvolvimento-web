<!-- 21. Exiba a data e a hora atuais.
22. Converta uma data no formato "dd/mm/yyyy" para "yyyy-
mm-dd".
23. Exiba o dia da semana de uma data específica.
24. Calcule a diferença de dias entre duas datas.
25. Adicione 30 dias a uma data e exiba o novo valor. -->

<?php
    //21
    echo '<br>' . date("d/m/Y - H:i:s");

    //22
    $data = "15/02/2025";
    $dataFormatada = DateTime::createFromFormat("d/m/Y", $data);
    echo '<br><br>'. $dataFormatada->format("Y-m-d");

    //23
    $data = "15/02/2025";
    $diaSemana = date("w", strtotime($data));
    $diaSemana = date("l", mktime(0, 0, 0, date("d", strtotime($data)), date("m", strtotime($data)), date("Y", strtotime($data))));
    echo '<br><br>'. $diaSemana;

    //24
    $data1 = "15/02/2025";
    $data2 = "20/02/2025";
    $data1 = DateTime::createFromFormat("d/m/Y", $data1);
    $data2 = DateTime::createFromFormat("d/m/Y", $data2);
    $diferenca = $data2->diff($data1);
    echo '<br><br>A diferenca eh de: '. $diferenca->days . ' ' .'dias';

    //25
    $data = "15/02/2025";
    $data = DateTime::createFromFormat("d/m/Y", $data);
    $data->format("Y-m-d");
    $data->modify("+30 days");
    echo '<br><br>'. $data->format("d/m/Y");
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