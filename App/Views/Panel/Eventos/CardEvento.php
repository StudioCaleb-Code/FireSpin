<div class="cardEvn">

    <!-- LINK -->
    <a href="<?= BASE_URL ?>/Panel/Eventos/infoEvento" class="linkCardEvn">

        <!-- FOTO -->
        <div class="fotoEvn">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp08sOu4--AZmjGcn_WomVBw2nRed386o4cQ&s"
                alt="Foto del evento">
            <!-- solo aparece al hover -->
            <div class="btnEntrarRuleta">
                <samp class="ruleta">Empezar</samp>
                <!-- <a href="#rulea" class="ruleta">Empezar</a> -->
            </div>
        </div>
    </a>

    <!-- TEXTO -->
    <div class="tiDesEvn">

        <h2 class="nombreEvn">
            Feliz Dia Mamá
        </h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat corporis ipsa quas totam et reiciendis
            expedita.</p>
    </div>


    <!-- BOTONES -->
    <div class="btnAccionEvn">

        <button class="linkURL">
            <i class="bi bi-share"></i>
            <span>Compartir</span>
        </button>

        <a href="<?= BASE_URL ?>/Panel/Eventos/infoEvento" class="linkEditar">
            <i class="bi bi-folder2-open"></i>
            <span>Detalles</span>
        </a>
        <a href="<?= BASE_URL ?>/Panel/Eventos/formEvento" class="linkEditar">
            <i class="bi bi-pencil"></i>
            <span>Editar</span>
        </a>

        <button class="linkEliminar">
            <i class="bi bi-trash"></i>
            <span>Eliminar</span>
        </button>

    </div>

</div>

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