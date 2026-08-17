<?php

// Passando valores pela URL
// http://localhost/php-exemplos-basicos/2_opera_variaveis.php?numero1=10&numero2=5

// Método nativo do PHP "_GET", usado para passar valores pela URL
$numero1= $_GET['numero1'];
$numero2= $_GET['numero2'];

// Verifíca se os valores foram passados corretamente
// A função isset() nativa do PHP verifica se os valores foram passados corretamente
if (isset($numero1) && ($numero2)) {
    // Converte os valores para internos
    $numero1 = (int)$numero1;
    $numero2 = (int)$numero2;

    // Cálculos
    $soma = $numero1 + $numero2;
    $subtração = $numero1 - $numero2;
    $multiplicacao = $numero1 * $numero2;
    $divisao = $numero1 / $numero2;

    // Exibir resultados
    echo "Soma: $soma <br>";
    echo "Subtração: $subtração <br>";
    echo "Multiplição: $multiplicacao <br>";
    echo "Divisão: $divisao <br>";

} else {
    echo "Por favor, forneça os valores pela URL";
}