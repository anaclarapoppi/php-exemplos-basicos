<?php
// Desafio 1 - Cálculo de preço com desconto
// Regra: compras a partir de R$ 200,00 recebem 10% de desconto

$precoOriginal = 250.00; // altere aqui para testar outros valores

if ($precoOriginal >= 200.00) {
    $desconto = $precoOriginal * 0.10;
    $precoFinal = $precoOriginal - $desconto;
} else {
    $desconto = 0;
    $precoFinal = $precoOriginal;
}

echo "Preço original: R$ " . number_format($precoOriginal, 2, ',', '.') . "<br>";
echo "Desconto aplicado: R$ " . number_format($desconto, 2, ',', '.') . "<br>";
echo "Preço final: R$ " . number_format($precoFinal, 2, ',', '.') . "<br>";
?>
