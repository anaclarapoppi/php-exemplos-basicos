<?php
// Desafio 5 - Função calcularIMC($peso, $altura)
// Calcula o IMC e classifica: Abaixo do peso, Peso normal, Sobrepeso ou Obesidade

function calcularIMC($peso, $altura) {
    $imc = $peso / ($altura * $altura);

    if ($imc < 18.5) {
        $classificacao = "Abaixo do peso";
    } elseif ($imc < 25) {
        $classificacao = "Peso normal";
    } elseif ($imc < 30) {
        $classificacao = "Sobrepeso";
    } else {
        $classificacao = "Obesidade";
    }

    return [
        "imc" => round($imc, 2),
        "classificacao" => $classificacao
    ];
}

// Teste da função
$peso = 70;    // kg - altere aqui para testar
$altura = 1.75; // metros - altere aqui para testar

$resultado = calcularIMC($peso, $altura);

echo "Peso: " . $peso . " kg<br>";
echo "Altura: " . $altura . " m<br>";
echo "IMC calculado: " . $resultado["imc"] . "<br>";
echo "Classificação: " . $resultado["classificacao"] . "<br>";
?>