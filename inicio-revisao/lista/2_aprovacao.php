<?php
// Desafio 2 - Verificação de aprovação
// Regra: aprovado se média >= 6.0 E faltas <= 15 (operador &&)

$media = 7.5;   // altere aqui para testar
$faltas = 10;   // altere aqui para testar

if ($media >= 6.0 && $faltas <= 15) {
    $situacao = "Aprovado";
} else {
    $situacao = "Reprovado";
}

echo "Média: " . $media . "<br>";
echo "Faltas: " . $faltas . "<br>";
echo "Situação: " . $situacao . "<br>";
?>