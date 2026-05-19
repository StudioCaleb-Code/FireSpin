<?php if (!empty($Eventos)): ?>
    <?php foreach ($Eventos as $evento): ?>
        <div class="cardEvn">

            <a href="<?= BASE_URL ?>panel/eventos/infoEvento/<?= $evento['id_evento'] ?>" class="linkCardEvn">
                <div class="fotoEvn">
                    <?php
                    $rutaImagen = !empty($evento['imagen']) ? UPLOAD_URL . 'portada/' . $evento['imagen'] : ASSETS_URL . 'img/default-evento.png';
                    ?>
                    <img src="<?= $rutaImagen ?>" alt="Foto del evento: <?= htmlspecialchars($evento['nombre']) ?>">

                    <div class="btnEntrarRuleta">
                        <samp class="ruleta">Empezar</samp>
                    </div>
                </div>
            </a>

            <div class="tiDesEvn">
                <h2 class="nombreEvn">
                    <?= htmlspecialchars($evento['nombre']) ?>
                </h2>
                <p>
                    <?= htmlspecialchars($evento['descripcion'] ?? 'Sin descripción disponible.') ?>
                </p>
            </div>

            <div class="btnAccionEvn">

                <button class="linkURL" data-slug="<?= htmlspecialchars($evento['slug']) ?>"
                    data-nombre="<?= htmlspecialchars($evento['nombre']) ?>">
                    <i class="bi bi-share"></i>
                    <span>Compartir</span>
                </button>

                <a href="<?= BASE_URL ?>panel/eventos/infoEvento/<?= $evento['id_evento'] ?>" class="linkEditar">
                    <i class="bi bi-folder2-open"></i>
                    <span>Detalles</span>
                </a>

                <a href="<?= BASE_URL ?>panel/eventos/formEvento/<?= $evento['id_evento'] ?>" class="linkEditar">
                    <i class="bi bi-pencil"></i>
                    <span>Editar</span>
                </a>

                <button class="linkEliminar"
                    onclick="if(confirm('¿Seguro que deseas eliminar este evento?')) window.location.href='<?= BASE_URL ?>panel/eventos/delete/<?= $evento['id_evento'] ?>'">
                    <i class="bi bi-trash"></i>
                    <span>Eliminar</span>
                </button>

            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-eventos" style="text-align: center; padding: 20px; width: 100%;">
        <i class="bi bi-calendar-x" style="font-size: 3rem; color: #ccc;"></i>
        <p style="color: #666; margin-top: 10px;">No hay eventos registrados en este momento.</p>
    </div>
<?php endif; ?>

<div class="overlayModal" id="compartirModal">
    <div class="modalLink">
        <h2 class="tituloLink" id="modalTitulo">
            Compartir link del Evento
        </h2>

        <div class="moLinkEvn">
            <input type="text" class="inputLinkEvento" id="modalInputLink" readonly>

            <button class="copiarLink" id="btnCopiarLink">
                <i class="bi bi-copy"></i>
                <span class="copyL">Copiar</span>
            </button>
        </div>
    </div>
</div>