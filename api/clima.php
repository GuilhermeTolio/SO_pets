<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Simulação de API de clima (você pode substituir por uma API real como OpenWeatherMap)
try {
    // Para usar uma API real, você precisaria de uma chave de API
    // $apiKey = 'SUA_CHAVE_DA_API';
    // $cidade = $_GET['cidade'] ?? 'São Paulo';
    // $url = "https://api.openweathermap.org/data/2.5/weather?q={$cidade}&appid={$apiKey}&units=metric&lang=pt_br";
    
    // Por enquanto, vamos simular dados do clima
    $climas = [
        ['temp' => 25, 'desc' => 'Ensolarado', 'umidade' => 60],
        ['temp' => 22, 'desc' => 'Parcialmente nublado', 'umidade' => 70],
        ['temp' => 18, 'desc' => 'Chuvoso', 'umidade' => 85],
        ['temp' => 28, 'desc' => 'Muito quente', 'umidade' => 45],
        ['temp' => 20, 'desc' => 'Nublado', 'umidade' => 75]
    ];
    
    $clima = $climas[array_rand($climas)];
    
    echo json_encode([
        'cidade' => 'São Paulo, SP',
        'temperatura' => $clima['temp'],
        'descricao' => $clima['desc'],
        'umidade' => $clima['umidade'],
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao obter dados do clima']);
}
?>
