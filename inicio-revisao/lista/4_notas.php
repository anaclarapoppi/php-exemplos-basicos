<?php
// Desafio 4 - Processamento de um vetor com 5 notas
// Calcula: média da turma, maior nota e menor nota

$notas = [7.5, 8.0, 5.5, 9.0, 6.5]; // altere aqui para testar

$soma = 0;
$maior = $notas[0];
$menor = $notas[0];

for ($i = 0; $i < count($notas); $i++) {
    $soma += $notas[$i];

    if ($notas[$i] > $maior) {
        $maior = $notas[$i];
    }

    if ($notas[$i] < $menor) {
        $menor = $notas[$i];
    }
}

$media = $soma / count($notas);

echo "Notas: " . implode(", ", $notas) . "<br>";
echo "Média da turma: " . number_format($media, 2, ',', '.') . "<br>";
echo "Maior nota: " . $maior . "<br>";
echo "Menor nota: " . $menor . "<br>";
?>