<?php
function calcularDistancia($lat1, $lon1, $lat2, $lon2) {
    // Converter de graus para radianos
    $lat1 = deg2rad($lat1);
    $lon1 = deg2rad($lon1);
    $lat2 = deg2rad($lat2);
    $lon2 = deg2rad($lon2);

    // Raio da Terra em quilômetros
    $raioTerra = 6371;

    // Diferença entre as latitudes e longitudes
    $dLat = $lat2 - $lat1;
    $dLon = $lon2 - $lon1;

    // Fórmula de Haversine
    $a = sin($dLat / 2) * sin($dLat / 2) +
         cos($lat1) * cos($lat2) * 
         sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    // Distância em quilômetros
    $distancia = $raioTerra * $c;

    return $distancia;
}

function calcularFrete($distancia, $tarifaPorKm) {
    // Calcular o custo total do frete
    return $distancia * $tarifaPorKm;
}

// Capturar os valores dos inputs do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lat1 = $_POST['lat1'];
    $lon1 = $_POST['long1'];
    $lat2 = $_POST['lat2'];
    $lon2 = $_POST['long2'];

    // Definir a tarifa por quilômetro (exemplo: R$ 2,50 por km)
    $tarifaPorKm = 2.50;

    // Validar os dados (assegurar que são numéricos)
    if (is_numeric($lat1) && is_numeric($lon1) && is_numeric($lat2) && is_numeric($lon2)) {
        // Calcular a distância
        $distancia = calcularDistancia($lat1, $lon1, $lat2, $lon2);
        // Calcular o valor do frete
        $frete = calcularFrete($distancia, $tarifaPorKm);

        echo "A distância entre os dois pontos é: " . round($distancia, 2) . " km<br>";
        echo "O valor do frete é: R$ " . number_format($frete, 2, ',', '.') . "<br>";
    } else {
        echo "Por favor, insira valores válidos para latitude e longitude.";
    }
}
?>
