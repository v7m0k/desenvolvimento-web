<?php

class Agenda {
    var $directory = 'agenda_data/';
    var $maxPessoas = 10;

    function __construct() {
        if (!is_dir($this->directory)) {
            mkdir($this->directory, 0777, true);
        }
    }

    function armazenaPessoa($nome, $idade, $altura) {
        if (count(glob($this->directory . '*.json')) >= $this->maxPessoas) {
            echo "<div class ='container'><p class='error'>Agenda cheia!</p>,</div>";
            return;
        }
        
        $filename = $this->directory . md5($nome) . '.json';
        if (file_exists($filename)) {
            echo "<div class ='container'><p class='error'>Pessoa já cadastrada!</p></div>";
            return;
        }

        $pessoa = [
            'nome' => $nome,
            'idade' => $idade,
            'altura' => $altura
        ];
        file_put_contents($filename, json_encode($pessoa));
    }

    function removePessoa($nome) {
        $filename = $this->directory . md5($nome) . '.json';
        if (file_exists($filename)) {
            unlink($filename);
            echo "<div class ='container'><p class='success'>Pessoa removida!</p></div>";
        } else {
            echo "<div class ='container'><p class='error'>Pessoa não encontrada!</p></div>";
        }
    }

    function buscaPessoa($nome) {
        $files = array_values(glob($this->directory . '*.json'));
        foreach ($files as $index => $file) {
            $data = json_decode(file_get_contents($file), true);
            if ($data['nome'] === $nome) {
                return $index;
            }
        }
        return -1;
    }

    function imprimeAgenda() {
        $files = glob($this->directory . '*.json');
        if (empty($files)) {
            echo "<div class ='container'><p class='error'>Agenda vazia!</p></div>";
            return;
        }
        
        echo "<table><tr><th>Nome</th><th>Idade</th><th>Altura</th></tr>";
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            echo "<tr><td>{$data['nome']}</td><td>{$data['idade']}</td><td>{$data['altura']}</td></tr>";
        }
        echo "</table>";
    }

    function imprimePessoa($index) {
        $files = array_values(glob($this->directory . '*.json'));
        if (isset($files[$index])) {
            $data = json_decode(file_get_contents($files[$index]), true);
            echo "<p><strong> Nome: </strong> {$data['nome']}</p><p><strong> Idade: </strong> {$data['idade']}</p><p><strong> Altura: </strong> {$data['altura']}</p>";
        } else {
            echo "<div class ='container'><p class='error'>Pessoa não encontrada na posição $index!</p><div>";
        }
    }
}

$agenda = new Agenda();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $agenda->armazenaPessoa($_POST['nome'], $_POST['idade'], $_POST['altura']);
    } elseif (isset($_POST['remove'])) {
        $agenda->removePessoa($_POST['nome']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agenda Interna</title>
</head>
<body>
    
</body>
</html>