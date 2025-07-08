<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    $url = 'https://random.dog/woof.json';
    
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 10,
            'user_agent' => 'Sistema ONG Pets'
        ]
    ]);
    
    $response = file_get_contents($url, false, $context);
    
    if($response === false) {
        throw new Exception('Erro ao buscar foto de cachorro');
    }
    
    $data = json_decode($response, true);
    
    if(!$data || !isset($data['url'])) {
        throw new Exception('Resposta inválida da API');
    }
    
    echo json_encode([
        'success' => true,
        'type' => 'dog',
        'image_url' => $data['url'],
        'message' => 'Foto aleatória de cachorro para alegrar seu dia!',
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Erro ao buscar foto de cachorro',
        'message' => 'Não foi possível carregar a imagem no momento',
        'timestamp' => date('Y-m-d H:i:s')
    ]);
}
?>
