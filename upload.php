<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $directory = $_POST["directory"] ?? '';
        $allowedDirectories = ['PROJETOS', 'ADM', 'MISC'];

        if (in_array($directory, $allowedDirectories)) {
            $destinationDir = '/var/www/html/' . $directory . '/';
            if (!is_dir($destinationDir)) {
                mkdir($destinationDir, 0777, true);
            }

            $filename = $_FILES["file"]["name"];
            $tmpFilePath = $_FILES["file"]["tmp_name"];
            $destinationPath = $destinationDir . $filename;

            if (move_uploaded_file($tmpFilePath, $destinationPath)) {
                echo "Arquivo enviado com sucesso!";
            } else {
                echo "Erro ao enviar o arquivo.";
            }
        } else {
            echo "Diretório inválido.";
        }
    } else {
        echo "Nenhum arquivo enviado.";
    }
}
?>
