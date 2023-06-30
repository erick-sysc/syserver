<?php
session_start();

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); // Redireciona para a página de login após o logout
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Syserver</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 30px;
        }

        form {
            margin-bottom: 20px;
         }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select,
        .form-group input[type="file"] {
            margin-bottom: 10px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
         }

        .file-list {
            list-style-type: none;
            padding: 0;
        }
        
        .file-list li {
            margin-bottom: 5px;
        }

        .file-list li a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Interface de Envio e Download de Arquivos</h1>

    <a href="home.php?logout=true">Logout</a>

    <h2>Enviar Arquivo</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="directory">Diretório de destino:</label>
            <select name="directory" id="directory">
                <option value="">Selecione um diretório</option>
                <option value="ADM">ADM</option>
                <option value="PROJETOS">Projetos</option>
                <option value="MISC">Misc</option>
                <!-- Adicione mais opções de diretório, se necessário -->
            </select>
        </div>
        <div class="form-group">
            <label for="file">Selecionar arquivo:</label>
            <input type="file" name="file" id="file">
        </div>
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn">
        </div>
    </form>

    <h2>Arquivos enviados para PROJETOS</h2>
    <?php
    $projetosFiles = glob('/var/www/html/PROJETOS/*');
    if (count($projetosFiles) > 0) {
        echo '<ul class="file-list">';
        foreach ($projetosFiles as $file) {
            echo '<li><a class="file-link" href="' . $file . '" target="_blank">' . basename($file) . '</a> <a class="file-download-link" href="download.php?file=' . urlencode($file) . '">Download</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'Nenhum arquivo enviado ainda.';
    }
    ?>
    
    <h2>Arquivos enviados para ADM</h2>
    <?php
    $admFiles = glob('/var/www/html/ADM/*');
    if (count($admFiles) > 0) {
        echo '<ul class="file-list">';
        foreach ($admFiles as $file) {
            echo '<li><a class="file-link" href="' . $file . '" target="_blank">' . basename($file) . '</a> <a class="file-download-link" href="download.php?file=' . urlencode($file) . '">Download</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'Nenhum arquivo enviado ainda.';
    }
    ?>

    <h2>Arquivos enviados para MISC</h2>
    <?php
    $miscFiles = glob('/var/www/html/MISC/*');
    if (count($miscFiles) > 0) {
        echo '<ul class="file-list">';
        foreach ($miscFiles as $file) {
            echo '<li><a class="file-link" href="' . $file . '" target="_blank">' . basename($file) . '</a> <a class="file-download-link" href="download.php?file=' . urlencode($file) . '">Download</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'Nenhum arquivo enviado ainda.';
    }
    ?>
</body>
</html>

