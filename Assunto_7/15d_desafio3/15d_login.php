<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        <label for="cor">Cor de Fundo:</label>
        <select name="cor" required>
            <option value="purple">Roxo</option>
            <option value="cyan">Ciano</option>
            <option value="pink">Rosa</option>
            <option value="grey">Cinza</option>
        </select><br>
        <button type="submit">Entrar</button>
    </form>
 <?php
    session_start();
 
    // Mostra os erros do PHP na tela (ajuda a descobrir problemas)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
 
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores enviados pelo formulário
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        // Cor de fundo escolhida no formulário (só aceita as cores da lista)
        $cor = $_POST['cor'];
        if (!in_array($cor, ["purple", "cyan", "pink", "grey"])) {
            $cor = "pink";
        }
 
        // Conecta ao banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "Senai@118";
        $dbname = "exercicio";
 
        $conn = new mysqli($servername, $username, $password, $dbname);
 
        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }
 
        // Evita que caracteres especiais quebrem a consulta
        $usuario = $conn->real_escape_string($usuario);
        $senha = $conn->real_escape_string($senha);
 
        // Consulta o usuário no BD
        $sql = "SELECT * FROM usuarios
                WHERE usuario = '$usuario' AND senha = '$senha'";
 
        $result = $conn->query($sql);
 
        // Verifica se a consulta deu erro (ex: tabela não existe)
        if ($result === false) {
            die("Erro na consulta: " . $conn->error);
        }
 
        // Verifica se encontrou o usuário
        if ($result->num_rows > 0) {
            // Salva o usuário e a cor escolhida na sessão
            $_SESSION['usuario'] = $usuario;
            $_SESSION['cor'] = $cor;
 
            header("Location: 15d_perfil.php");
            exit();
        } else {
            echo "<p style='color: red;'>Usuário ou senha incorretos!</p>";
        }
 
        // Fecha a conexão
        $conn->close();
    }
    ?>
</body>
</html>