<?php
 if (isset($_GET['dia_nasc']) && isset($_GET['mes_nasc']) && isset($_GET['ano_nasc'])) {
    $diaNascimento = $_GET['dia_nasc'];
    $mesNascimento = $_GET['mes_nasc'];
    $anoNascimento = $_GET['ano_nasc'];

    //data atual
    $diaAtual = 22;
    $mesAtual = 2;
    $anoAtual = 2025;

    //funcao do php datetime
    $dataNascimento = new DateTime("$anoNascimento-$mesNascimento-$diaNascimento");
    $dataAtual = new DateTime("$anoAtual-$mesAtual-$diaAtual");

    //diferenca
    $intervalo = $dataNascimento->diff($dataAtual);
    //converter em dias
    $diasDeVida = $intervalo->days;

    echo "<h1><p>voce ja viveu $diasDeVida dias</p></h1>";
} else {
    echo "<h1>erro pai</h1>";
}
?>