<link rel="stylesheet" href="<?= CSS_URL ?>bootstrap-icons.css">

<section class="seccionEvn">
    <div class="formCard">
        <h2>REGISTRAR PREMIO PARA EL EVENTO ( <?= $_SESSION['creando_evento_nombre'] ?? 'Nuevo Evento' ?> )</h2>
        <hr class="hr-newEvento">

        <form action="<?= BASE_URL ?>panel/eventos/storePremio" method="POST" enctype="multipart/form-data" class="form-evento">
            <label class="subTitulo">Nombres - Descripción - Cantidad</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-box"></i>
                    <input type="text" name="nombre" id="nombrePremio" placeholder="Nombre" required>
                </div>

                <div class="input-group">
                    <i class="bi bi-chat-left-text"></i>
                    <textarea name="descripcion" id="descripcionPremio" placeholder="Descripción"></textarea>
                </div>

                <div class="input-group">
                    <i class="bi bi-boxes"></i>
                    <input type="number" name="cantidad" id="cantidadPremio" placeholder="Cantidad disponible" value="1">
                </div>
            </div>

            <label class="subTitulo">Portada del premio</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-image"></i>
                    <input type="file" name="foto_principal" id="fotoPremio" required>
                </div>
            </div>

            <label class="subTitulo">Fotos referenciales (Múltiples)</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-image"></i>
                    <input type="file" name="fotos_referenciales[]" id="fotosReferenciales" multiple>
                </div>
            </div>

            <br>
            <div class="btn-formEvento">
                <a href="<?= BASE_URL ?>panel/eventos/formEvento">
                    <i class="bi bi-arrow-left"></i>
                    Atrás
                </a>
                <button type="submit" class="guardarContinuar" style="border:none; cursor:pointer;">
                    Guardar y terminar
                </button>
            </div>
        </form>
    </div>
</section>