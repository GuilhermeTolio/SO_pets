<?php
/**
 * Helper para gerenciar as imagens das APIs HTTP Dog e Cat
 */
class StatusImageHelper {
    
    /**
     * Retorna a URL da imagem baseada no código de status
     * @param int $statusCode Código de status HTTP
     * @param string $type Tipo da API: 'cat' ou 'dog'
     * @return string URL da imagem
     */
    public static function getImageUrl($statusCode, $type = 'cat') {
        if ($type === 'dog') {
            return "https://http.dog/{$statusCode}.jpg";
        }
        return "https://http.cat/{$statusCode}";
    }
    
    /**
     * Retorna HTML da imagem de status com fallback
     * @param int $statusCode Código de status HTTP
     * @param string $message Mensagem alternativa
     * @param string $type Tipo da API: 'cat' ou 'dog'
     * @param int $width Largura da imagem em pixels
     * @return string HTML da imagem
     */
    public static function getStatusImage($statusCode, $message = '', $type = 'cat', $width = 200) {
        $imageUrl = self::getImageUrl($statusCode, $type);
        $alt = "HTTP " . ucfirst($type) . " {$statusCode}";
        
        $html = '<div class="status-image-container" style="text-align: center; margin: 20px 0;">';
        $html .= "<img src=\"{$imageUrl}\" alt=\"{$alt}\" class=\"status-image\" ";
        $html .= "style=\"max-width: {$width}px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);\" ";
        $html .= "onerror=\"this.style.display='none'; this.nextElementSibling.style.display='block';\">";
        
        $html .= '<div class="status-fallback" style="display: none; padding: 20px; background: #f8f9fa; border-radius: 8px; color: #6c757d;">';
        $html .= '<p>🔄 Status ' . $statusCode . '</p>';
        if ($message) {
            $html .= '<p>' . htmlspecialchars($message) . '</p>';
        }
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * Retorna um card completo de status com imagem e mensagem
     * @param int $statusCode Código de status HTTP
     * @param string $title Título da mensagem
     * @param string $message Mensagem detalhada
     * @param string $type Tipo da API: 'cat' ou 'dog'
     * @param string $cardClass Classe CSS adicional para o card
     * @return string HTML do card completo
     */
    public static function getStatusCard($statusCode, $title, $message, $type = 'cat', $cardClass = '') {
        $imageHtml = self::getStatusImage($statusCode, $message, $type, 300);
        
        $statusClass = '';
        if ($statusCode >= 200 && $statusCode < 300) {
            $statusClass = 'success';
        } elseif ($statusCode >= 400 && $statusCode < 500) {
            $statusClass = 'warning';
        } elseif ($statusCode >= 500) {
            $statusClass = 'error';
        }
        
        $html = '<div class="status-card ' . $cardClass . ' alert-' . $statusClass . '" ';
        $html .= 'style="background: white; border-radius: 12px; padding: 30px; margin: 20px 0; ';
        $html .= 'box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; ';
        
        if ($statusClass === 'success') {
            $html .= 'border-left: 5px solid #28a745;">';
        } elseif ($statusClass === 'warning') {
            $html .= 'border-left: 5px solid #ffc107;">';
        } elseif ($statusClass === 'error') {
            $html .= 'border-left: 5px solid #dc3545;">';
        } else {
            $html .= 'border-left: 5px solid #007bff;">';
        }
        
        $html .= '<h2 style="margin-bottom: 10px; color: #333;">' . htmlspecialchars($title) . '</h2>';
        $html .= '<p style="color: #666; margin-bottom: 20px;">' . htmlspecialchars($message) . '</p>';
        $html .= $imageHtml;
        $html .= '<p style="margin-top: 15px; font-size: 14px; color: #999;">Status HTTP: ' . $statusCode . '</p>';
        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * Retorna emoji baseado no tipo de animal
     * @param string $type Tipo da API: 'cat' ou 'dog'
     * @return string Emoji do animal
     */
    public static function getAnimalEmoji($type) {
        return $type === 'dog' ? '🐕' : '😺';
    }
}
?>
