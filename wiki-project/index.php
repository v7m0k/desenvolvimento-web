<?php

// exemplo
class CodigoExemplo {
    public $titulo;
    public $codigo;

    public function __construct($titulo, $codigo) {
        $this->titulo = $titulo;
        $this->codigo = $codigo;
    }

    public function formatarParaSalvar() {
        return "Exemplo: $this->titulo\n$this->codigo\n\n";
    }
}

// teoria
class Teoria {
    public $titulo;
    public $conteudo;
    public $exemplos = [];

    public function __construct($titulo, $conteudo) {
        $this->titulo = $titulo;
        $this->conteudo = $conteudo;
    }

    public function adicionarExemplo($exemplo) {
        $this->exemplos[] = $exemplo;
    }

    public function salvarEmArquivo() {
        if (!file_exists('teorias')) {
            mkdir('teorias');
        }
        $nomeArquivo = 'teorias/' . $this->titulo . '.txt';
        $texto = "Teoria: $this->titulo\n$this->conteudo\n\n";
        foreach ($this->exemplos as $ex) {
            $texto .= $ex->formatarParaSalvar();
        }
        file_put_contents($nomeArquivo, $texto);
    }

    public static function deletarArquivo($titulo) {
        $nomeArquivo = 'teorias/' . $titulo . '.txt';
        if (file_exists($nomeArquivo)) {
            unlink($nomeArquivo);
        }
    }
}

// wiki
class Wiki {
    public $teorias = [];

    public function adicionarTeoria($teoria) {
        $this->teorias[] = $teoria;
        $teoria->salvarEmArquivo();
    }

    public function editarTeoria($tituloAntigo, $novaTeoria) {
        Teoria::deletarArquivo($tituloAntigo);
        $novaTeoria->salvarEmArquivo();
    }

    public function removerTeoria($titulo) {
        Teoria::deletarArquivo($titulo);
    }

    public function listarTeorias() {
        return glob("teorias/*.txt");
    }

    public function lerTeoria($nomeArquivo) {
        return file_get_contents($nomeArquivo);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>WIKI - MANUAL PHP</title>
</head>
<body>
<?php
    $wiki = new Wiki();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['remover'])) {
            $wiki->removerTeoria($_POST['remover']);
            echo "<p><strong>Teoria removida com sucesso!</strong></p>";
            header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
            exit;
        } else {
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $exemploTitulo = $_POST['exemplo_titulo'];
            $exemploCodigo = $_POST['exemplo_codigo'];
            $editar = $_POST['editar'] ?? '';

            $teoria = new Teoria($titulo, $conteudo);
            $exemplo = new CodigoExemplo($exemploTitulo, $exemploCodigo);
            $teoria->adicionarExemplo($exemplo);

            if ($editar) {
                $wiki->editarTeoria($editar, $teoria);
                echo "<p><strong>Teoria editada com sucesso!</strong></p>";
            } else {
                $wiki->adicionarTeoria($teoria);
                echo "<p><strong>Teoria salva com sucesso!</strong></p>";
            }
        }
    }

    if (isset($_GET['editar'])) {
        $nomeArquivo = $_GET['editar'];
        $conteudo = $wiki->lerTeoria($nomeArquivo);
        preg_match('/Teoria: (.*?)\n(.*?)(?=\n\nExemplo)/s', $conteudo, $match);
        $tituloEdit = $match[1];
        $textoEdit = trim($match[2]);
        preg_match('/Exemplo: (.*?)\n(.*)/s', $conteudo, $ex);
        $exTitulo = $ex[1];
        $exCodigo = trim($ex[2]);
    }
?>

    <h1><?= isset($tituloEdit) ? "Editar Teoria" : "Adicionar Teoria" ?></h1>
    <form method="POST">
        <input type="hidden" name="editar" value="<?= $tituloEdit ?? '' ?>">
        <label>Titulo da Teoria:</label><br>
        <input type="text" name="titulo" value="<?= $tituloEdit ?? '' ?>" required><br>

        <label>Conteudo da Teoria:</label><br>
        <textarea name="conteudo" rows="5" required><?= $textoEdit ?? '' ?></textarea><br>

        <label>Titulo do Exemplo:</label><br>
        <input type="text" name="exemplo_titulo" value="<?= $exTitulo ?? '' ?>" required><br>

        <label>Codigo do Exemplo:</label><br>
        <textarea name="exemplo_codigo" rows="5" required><?= $exCodigo ?? '' ?></textarea><br>

        <input type="submit" value="<?= isset($tituloEdit) ? 'Atualizar' : 'Salvar' ?>">
    </form>

    <div class="teorias-lista">
        <h2>Teorias Salvas</h2>
        <ul>
        <?php
            foreach ($wiki->listarTeorias() as $arquivo) {
                $nome = basename($arquivo, '.txt');
                echo "<li>
                    <a href='?ver=" . urlencode($arquivo) . "'>$nome</a> |
                    <a href='?editar=" . urlencode($arquivo) . "' class='btn'>Editar</a> |
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='remover' value='$nome'>
                        <button type='submit' class='btn btn-danger'>Remover</button>
                    </form>
                </li>";
            }

            if (isset($_GET['ver'])) {
                echo "<h3><pre>Conteudo da Teoria</h3><pre>" . $wiki->lerTeoria($_GET['ver']) . "</pre>";
            }
        ?>
        </ul>
    </div>
</body>
</html>
