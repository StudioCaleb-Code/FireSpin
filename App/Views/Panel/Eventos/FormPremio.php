<link rel="stylesheet" href="../../../../assets/css/bootstrap-icons.css">

<section class="seccionEvn">
    <div class="formCard">
        <h2>REGISTRAR PREMIO PARA EL EVENTO ( NOMBRE DEL EVENTO )</h2>
        <hr class="hr-newEvento">

        <form action="#" class="form-evento">
            <label class="subTitulo">Nombres - Descripcion - Cantidad</label>
            <div class="container-group">
                <!-- nombre -->
                <div class="input-group">
                    <!-- <label for="nobre_evento">Nombre</label> -->
                    <i class="bi bi-box"></i>
                    <input type="text" name="nombrePremio" id="nombrePremio" placeholder="Nombre" required>
                </div>

                <!-- Descripcion -->
                <div class="input-group">
                    <!-- <label for="nobre_evento">Descripcion</label> -->
                    <i class="bi bi-chat-left-text"></i>
                    <textarea name="descripcionPremio" id="descripcionPremio" placeholder="Descripcion"></textarea>
                </div>

                <div class="input-group">
                    <!-- <label for="nobre_evento">Descripcion</label> -->
                    <i class="bi bi-boxes"></i>
                    <input type="number" name="cantidadPremio" id="cantidadPremio"
                        placeholder="Cantidad disponible"></input>
                </div>
            </div>

            <label class="subTitulo">Portada del premio</label>
            <div class="container-group">
                <!-- Foto del evento -->
                <div class="input-group">
                    <!-- <label for="nobre_evento">Nombre</label> -->
                    <i class="bi bi-image"></i>
                    <input type="file" name="fotoPremio" id="fotoPremio" required>
                </div>
            </div>

            <label class="subTitulo">Fotos referenciales</label>
            <div class="container-group">
                <!-- Foto del evento -->
                <div class="input-group">
                    <!-- <label for="nobre_evento">Nombre</label> -->
                    <i class="bi bi-image"></i>
                    <input type="file" name="fotoPremio" id="fotoPremio" required>
                </div>
            </div>
        </form>

        <br>
        <!-- <hr class="hr-newEvento"> -->
        <div class="btn-formEvento">
            <a href="<?= BASE_URL ?>/Panel/Eventos/formEvento">
                <i class="bi bi-arrow-left"></i>
                Cancelar
            </a>
            <a href="<?= BASE_URL ?>/Panel/Eventos/formEventoPremi"" class=" guardarContinuar">Guardar y continuar</a>
        </div>
    </div>
</section>


<script src="fromEvento.js"></script>