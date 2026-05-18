<section>
    <!-- regresar -->
    <div class="infoEvn">
        <div class="linkEvnRegresar">
            <a href="<?= BASE_URL ?>/Panel/Eventos/" class="regresarE"> 
            <i class="bi bi-arrow-left"></i>
            <span>Regresar</span>
        </a>
    </div>

    <!-- navegador -->
    <nav class="navegador">
        <ul class="menuNav">
            <li class="listaNav">
                <a href="<?= BASE_URL ?>/Panel/Eventos" class="linkNav">
                    <i class="bi bi-check2-all"></i>
                    <span>Seleccionar todos</span>
                </a>
            </li>

            <li class="listaNav">
                <a href="<?= BASE_URL ?>/Panel/Eventos/SelecEvento" class="linkNav">
                    <i class="bi bi-check2"></i>
                    <span>Dejar de Seleccionar</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- tabla -->
    <table class="tablaEvento">
        <tr>
            <th>
                <i class="bi bi-circle">
                </i>
            </th>
            <th>N°</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Premios</th>
            <th>Acciones</th>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="selecEvento" id="selecEvento">
            </td>
            <td>01</td>
            <td class="tdFoto">
                <div class="fotoEvn">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp08sOu4--AZmjGcn_WomVBw2nRed386o4cQ&s"
                        alt="Foto del evento">
                </div>
            </td>
            <td>
                Dia de la Madre
            </td>
            <td>
                Laptop
            </td>
            <td class="btnAccionEvn">
                <button class="linkURL">
                    <i class="bi bi-share"></i>
                    <span>Compartir</span>
                </button>
            </td>
        </tr>

    </table>

    <!-- OVERLAY -->
    <div class="overlayModal">

        <!-- MODAL -->
        <div class="modalLink">

            <h2 class="tituloLink">
                Compartir link del Dia de la Madre
            </h2>

            <div class="moLinkEvn">

                <input type="text" class="inputLinkEvento" readonly>

                <button class="copiarLink">
                    <i class="bi bi-copy"></i>
                    <span class="copyL">Copiar</span>
                </button>

            </div>

        </div>

    </div>
</section>
