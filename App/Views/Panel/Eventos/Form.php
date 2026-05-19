<link rel="stylesheet" href="<?= CSS_URL ?>bootstrap-icons.css">

<section class="seccionEvn">
    <div class="formCard">
        <h2>REGISTRAR UN NUEVO EVENTO</h2>
        <hr class="hr-newEvento">

        <form action="<?= BASE_URL ?>panel/eventos/store" method="POST" enctype="multipart/form-data"
            class="form-evento">
            <label class="subTitulo">Nombres y descripción</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-box"></i>
                    <input type="text" name="nombre" id="nombreEvento" placeholder="Nombre" required>
                </div>

                <div class="input-group">
                    <i class="bi bi-chat-left-text"></i>
                    <textarea name="descripcion" id="descripcionEvento" placeholder="Descripción"></textarea>
                </div>
            </div>

            <label class="subTitulo">Fecha y hora</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-box"></i>
                    <input type="date" name="fecha_inicio" id="fechaInitEvento" required>
                </div>

                <div class="input-group">
                    <i class="bi bi-box"></i>
                    <input type="date" name="fecha_fin" id="fechaEndEvento" required>
                </div>
            </div>

            <label class="subTitulo">Portada del evento</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-image"></i>
                    <input type="file" name="imagen" id="fotoEnveto" required>
                </div>
            </div>

            <br>
            <div class="btn-formEvento">
                <a href="<?= BASE_URL ?>panel/eventos">
                    <i class="bi bi-arrow-left"></i>
                    Cancelar
                </a>
                <button type="submit" class="guardarContinuar" style="border:none; cursor:pointer;">
                    Guardar y continuar
                </button>
            </div>
        </form>
    </div>
</section>