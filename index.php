<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            margin-top: 0;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .form-group input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 3px;
            width: 100%;
        }

        .error-message {
            color: #ff0000;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td align="center">
                <div class="login-container">
                    <h2>Login</h2>
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label for="username">Usuário:</label>
                            <input type="text" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Entrar">
                        </div>
                    </form>
                    <?php
                    if (isset($_GET['error'])) {
                        echo '<div class="error-message">Usuário ou senha incorretos!</div>';
                    }
                    ?>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>



