<?php 
    $link = mysqli_connect("localhost", "root", "", "fai");
    if(!$link) {
        echo "deu red";
    }
    else {
        echo "conexao deu certo";
    }

    //funcao para gravar informacoes no banco de dados
  function gravaBD($link, $sql) {
        if(mysqli_query($link, $sql)) {
            echo "<br>dado cadastrado com sucesso!";
        }
        else {
            echo "Erro:" . $sql . "<br>" . mysqli_error($conn);
        }
    }

    //comando utilizando a funcao gravaBD para inserir os dados no banco.
    //porem apenas funciona recarregando a pagina.
   /* gravaBD($link, "INSERT INTO alunos(nome, sobrenome) VALUES ('arthur', 'teste')"); */

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];

    $comandoSQL = "INSERT INTO alunos (nome, sobrenome) VALUES ('".$nome."','".$sobrenome."')";
    gravaBD($link, $comandoSQL);
    
?>