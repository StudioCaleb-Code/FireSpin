<section>
    <div class="infoEvn">
        <div class="linkEvnRegresar">
            <a href="<?= BASE_URL ?>panel/eventos" class="regresarE"> 
                <i class="bi bi-arrow-left"></i>
                <span>Regresar</span>
            </a>
        </div>

        <div class="infoTitulo">
            <span>Título y descripción</span>
            <h2><?= htmlspecialchars($Evento['nombre']) ?></h2>
            <p><?= htmlspecialchars($Evento['descripcion'] ?? 'Sin descripción registrada.') ?></p>
        </div>

        <div class="infoPremio">
            <?php if (!empty($Premios)): ?>
                <?php foreach ($Premios as $index => $premio): ?>
                    <div class="cardPremio">
                        <div class="cardPuesto">
                            <span style="font-weight: bold; font-size: 14px;"><?= str_pad($index + 1, 2, "0", STR_PAD_LEFT) ?></span>
                        </div>

                        <div class="imgPremio">
                            <?php 
                            $imgPremio = !empty($premio['imagen']) ? UPLOAD_URL . 'premios/' . $premio['imagen'] : ASSETS_URL . 'img/default-premio.png';
                            ?>
                            <img src="<?= $imgPremio ?>" alt="Foto de: <?= htmlspecialchars($premio['nombre']) ?>">
                        </div>
                        
                        <h2><?= htmlspecialchars($premio['nombre']) ?></h2>
                        <p><?= htmlspecialchars($premio['descripcion'] ?? 'Sin descripción.') ?></p>
                        
                        <div style="margin-top: 8px; font-size: 13px; color: #555;">
                            <i class="bi bi-layers"></i> Cantidad Inicial: <strong><?= $premio['cantidad'] ?> unidades</strong>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color: #888; font-style: italic; padding: 10px;">Este evento aún no tiene premios asignados.</p>
            <?php endif; ?>
        </div>
    </div>
</section>