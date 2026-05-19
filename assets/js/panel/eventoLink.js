// Usamos querySelectorAll para capturar TODOS los botones de compartir de la lista
const botonesCompartir = document.querySelectorAll(".linkURL");
const overlayModal = document.querySelector(".overlayModal");
const inputLink = document.querySelector(".inputLinkEvento");
const btnCopiar = document.querySelector(".copiarLink");
const tituloModal = document.querySelector(".tituloLink");

/* DETECTAR EVENTOS EN TODOS LOS BOTONES */
botonesCompartir.forEach(boton => {
  boton.addEventListener("click", () => {
    // 1. Obtener los datos dinámicos guardados en el HTML de la tarjeta
    const slug = boton.getAttribute("data-slug");
    const nombre = boton.getAttribute("data-nombre");

    // 2. Construir la URL pública de la ruleta de manera inteligente usando la IP o Dominio actual
    // Si estás local detecta /EMPRENDEMAS, si estás en cPanel apunta a la raíz
    const pathArray = window.location.pathname.split('/');
    const proyectoCarpeta = pathArray[1] === 'panel' ? '' : `/${pathArray[1]}`;

    // Ruta final pública donde el participante se registrará
    const urlPublica = `${window.location.origin}${proyectoCarpeta}/ruleta/${slug}`;

    // 3. Inyectar los datos en el modal
    tituloModal.textContent = `Compartir link de: ${nombre}`;
    inputLink.value = urlPublica;

    // 4. Abrir el modal agregando tu clase CSS active
    overlayModal.classList.add("active");
  });
});

/* COPIAR LINK */
btnCopiar.addEventListener("click", async () => {
  try {
    await navigator.clipboard.writeText(inputLink.value);

    // Cambiar visualmente el botón al estado de éxito
    btnCopiar.innerHTML = `
      <i class="bi bi-check2"></i>
      <span class="copyL">¡Copiado!</span>
    `;

    setTimeout(() => {
      btnCopiar.innerHTML = `
        <i class="bi bi-copy"></i>
        <span class="copyL">Copiar</span>
      `;
    }, 2000);
  } catch (error) {
    alert("No se pudo copiar el enlace");
  }
});

/* CERRAR MODAL AL HACER CLICK AFUERA */
overlayModal.addEventListener("click", (e) => {
  if (e.target === overlayModal) {
    overlayModal.classList.remove("active");
  }
});