<?php
// Validação das credenciais
$credenciais = array(
    'ereng' => '1234',
    'denis' => 'Sysc@23#',
    'daniel'=> 'Sysc@23#'
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (array_key_exists($username, $credenciais) && $credenciais[$username] == $password) {
        // Autenticação bem-sucedida, redirecionar para a página principal
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        // Credenciais inválidas, redirecionar de volta para o formulário de login com uma mensagem de erro
        header("Location: index.html?error=1");
        exit();
    }
}
?>




