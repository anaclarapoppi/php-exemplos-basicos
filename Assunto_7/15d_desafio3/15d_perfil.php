<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: 15d_login.php");
    exit;
}

$usuario = $_SESSION["usuario"];
$cor     = $_SESSION["cor"] ?? "#ffffff";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
</head>
<body style="background-color: <?= htmlspecialchars($cor) ?>;">
    <h1>Bem-vindo, <?= htmlspecialchars($usuario) ?>!</h1>
    <p>Esta é a sua página de perfil.</p>
    <p><a href="15d_logout.php">Sair</a></p>
</body>
</html>