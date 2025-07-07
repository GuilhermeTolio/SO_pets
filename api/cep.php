<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$cep = $_GET['cep'] ?? '';
$cep = preg_replace('/\D/', '', $cep);

if(strlen($cep) !== 8) {
    http_response_code(400);
    echo json_encode(['error' => 'CEP inválido']);
    exit;
}

try {
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $response = file_get_contents($url);
    
    if($response === false) {
        throw new Exception('Erro ao consultar CEP');
    }
    
    $data = json_decode($response, true);
    
    if(isset($data['erro'])) {
        http_response_code(404);
        echo json_encode(['error' => 'CEP não encontrado']);
        exit;
    }
    
    echo json_encode([
        'cep' => $data['cep'],
        'logradouro' => $data['logradouro'],
        'complemento' => $data['complemento'],
        'bairro' => $data['bairro'],
        'localidade' => $data['localidade'],
        'uf' => $data['uf'],
        'ibge' => $data['ibge'],
        'gia' => $data['gia'],
        'ddd' => $data['ddd'],
        'siafi' => $data['siafi']
    ]);
    
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno do servidor']);
}
?>
