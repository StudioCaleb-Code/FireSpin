<link rel="stylesheet" href="<?= CSS_URL ?>bootstrap-icons.css">
<link rel="stylesheet" href="<?= CSS_URL ?>publico/registro-participante.css">

<section class="seccionInscripcion">
    <div class="formCardPublico">
        <h2>INSCRIPCIÓN AL EVENTO: <br><span class="eventoHighlight"><?= htmlspecialchars($Evento['nombre']) ?></span></h2>
        <p class="subtext">Completa tus datos para registrarte y poder girar la ruleta.</p>
        <hr class="hr-newEvento">

        <form action="<?= BASE_URL ?>ruleta/guardarParticipante" method="POST" class="form-evento">
            
            <input type="hidden" name="id_evento" value="<?= $Evento['id_evento'] ?>">
            <input type="hidden" name="slug_evento" value="<?= $Evento['slug'] ?>">

            <label class="subTitulo">Identificación (DNI)</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-card-text"></i>
                    <input type="text" name="dni" id="dniParticipante" placeholder="Número de DNI" maxlength="8" minlength="8" required>
                    <button type="button" id="btnBuscarReniec" class="btnBuscarApi">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

            <label class="subTitulo">Datos Personales</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-person"></i>
                    <input type="text" name="nombre" id="nombreParticipante" placeholder="Nombres y Apellidos" required>
                </div>

                <div class="input-group">
                    <i class="bi bi-phone"></i>
                    <input type="tel" name="celular" id="celularParticipante" placeholder="Número de Celular" maxlength="9" required>
                </div>
            </div>

            <label class="subTitulo">Correo Electrónico (Opcional)</label>
            <div class="container-group">
                <div class="input-group">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="correo" id="correoParticipante" placeholder="ejemplo@correo.com">
                </div>
            </div>

            <br>
            <div class="btn-formEvento">
                <button type="submit" class="guardarContinuar" style="width: 100%; border: none; cursor: pointer; padding: 15px; font-size: 16px;">
                    Registrarme y Jugar <i class="bi bi-arrow-right-short"></i>
                </button>
            </div>
        </form>
    </div>
</section>

<script src="<?= JS_URL ?>publico/registro.js"></script>