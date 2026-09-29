<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
<?php
$nome = "";
$preco = "";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = trim($_POST['nome'] ?? "");
    $preco = trim($_POST['preco'] ?? "");

    // Aceita vírgula como separador decimal (ex.: 19,90)
    $precoNormalizado = str_replace(",", ".", $preco);

    // Validação dos dados antes de inserir
    if ($nome === "") {
        $mensagem = "<p style='color: red;'>Erro: O nome do produto não pode estar vazio.</p>";
    } elseif (!is_numeric($precoNormalizado) || (float)$precoNormalizado <= 0) {
        $mensagem = "<p style='color: red;'>Erro: O preço deve ser um número positivo.</p>";
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "Senai@118";
        $dbname = "exercicio";

        // Tenta criar uma conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            $mensagem = "<p style='color: red;'>Falha na conexão: " . htmlspecialchars($conn->connect_error) . "</p>";
        } else {
            // Insere o produto usando prepared statement (evita SQL Injection)
            $stmt = $conn->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
            $precoFloat = (float)$precoNormalizado;
            $stmt->bind_param("sd", $nome, $precoFloat);

            // Feedback visual para o usuário
            if ($stmt->execute()) {
                $mensagem = "<p style='color: green;'>Produto cadastrado com sucesso!</p>";
                // Limpa os campos após o cadastro
                $nome = "";
                $preco = "";
            } else {
                $mensagem = "<p style='color: red;'>Erro ao cadastrar produto: " . htmlspecialchars($stmt->error) . "</p>";
            }

            $stmt->close();
            $conn->close();
        }
    }
}
?>

    <h1>Cadastro de Produtos</h1>

    <?php echo $mensagem; ?>

    <!-- HTML para cadastro de Nome do Produto e Preço -->
    <form action="" method="POST">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>">

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" value="<?php echo htmlspecialchars($preco); ?>">

        <button type="submit">Cadastrar</button>
 
    </form>
</body>
</html>