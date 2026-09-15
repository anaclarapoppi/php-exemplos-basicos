<?php
// Ativa exibição de erros (só para depuração — remova depois de resolver)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificador de Maioridade

$mensagem = "";
$nome = "";
$anoNascimento = "";

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Captura os dados do formulário
    $nome = trim($_POST["nome"]);
    $anoNascimento = trim($_POST["ano_nascimento"]);

    // Calcula a idade com base no ano de nascimento
    $anoAtual = (int) date("Y");
    $idade = $anoAtual - (int) $anoNascimento;

    // Verifica se é maior de idade
    if ($idade >= 18) {
        $mensagem = "✔️Acesso permitido, {$nome}!";

        // Salva nome e idade no arquivo de log
        $linha = "Nome: {$nome} | Idade: {$idade} | Data: " . date("d/m/Y H:i:s") . PHP_EOL;
        file_put_contents("log_acessos.txt", $linha, FILE_APPEND);

    } else {
        // Caso contrário, acesso negado
        $mensagem = "✖️ Acesso negado, {$nome}!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificador de Maioridade</title>
</head>
<body>

    <h1>Verificador de Maioridade</h1>

    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Ano de Nascimento:</label>
        <input type="number" name="ano_nascimento" required><br><br>

        <button type="submit">Verificar</button>
    </form>

    <?php if ($mensagem !== ""): ?>
        <p><strong><?php echo $mensagem; ?></strong></p>
    <?php endif; ?>

</body>
</html>
