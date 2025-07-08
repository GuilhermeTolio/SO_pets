<?php $title = 'Pet Não Encontrado - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <?php if (isset($statusImage)): ?>
            <?php echo $statusImage; ?>
        <?php else: ?>
            <div class="status-card alert-warning" style="background: white; border-radius: 12px; padding: 30px; margin: 20px 0; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; border-left: 5px solid #ffc107;">
                <h2 style="margin-bottom: 10px; color: #333;">🔍 Pet Não Encontrado</h2>
                <p style="color: #666; margin-bottom: 20px;">O pet que você está procurando não foi encontrado no nosso sistema.</p>
                
                <div class="status-image-container" style="text-align: center; margin: 20px 0;">
                    <img src="https://http.cat/404" alt="HTTP Cat 404" class="status-image" 
                         style="max-width: 300px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);" 
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    
                    <div class="status-fallback" style="display: none; padding: 20px; background: #f8f9fa; border-radius: 8px; color: #6c757d;">
                        <p>🔄 Status 404</p>
                        <p>Pet não encontrado</p>
                    </div>
                </div>
                
                <p style="margin-top: 15px; font-size: 14px; color: #999;">Status HTTP: 404</p>
            </div>
        <?php endif; ?>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="index.php?controller=pet&action=index" class="btn btn-primary">⬅️ Voltar à Lista de Pets</a>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
