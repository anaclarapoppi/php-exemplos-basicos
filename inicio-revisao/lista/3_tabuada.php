<?php
// Desafio 3 - Tabuada de um número (1 a 10) usando for

$numero = 7; // altere aqui para testar outro número

echo "Tabuada do " . $numero . ":<br>";

for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo $numero . " x " . $i . " = " . $resultado . "<br>";
}
?>
