<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    $url = 'https://api.thecatapi.com/v1/images/search';
    
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 10,
            'user_agent' => 'Sistema ONG Pets'
        ]
    ]);
    
    $response = file_get_contents($url, false, $context);
    
    if($response === false) {
        throw new Exception('Erro ao buscar foto de gato');
    }
    
    $data = json_decode($response, true);
    
    if(!$data || !is_array($data) || !isset($data[0]['url'])) {
        throw new Exception('Resposta inválida da API');
    }
    
    echo json_encode([
        'success' => true,
        'type' => 'cat',
        'image_url' => $data[0]['url'],
        'width' => $data[0]['width'] ?? null,
        'height' => $data[0]['height'] ?? null,
        'message' => 'Foto aleatória de gato para alegrar seu dia!',
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Erro ao buscar foto de gato',
        'message' => 'Não foi possível carregar a imagem no momento',
        'timestamp' => date('Y-m-d H:i:s')
    ]);
}
?>
