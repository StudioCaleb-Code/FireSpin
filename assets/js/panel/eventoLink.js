const btnCompartir = document.querySelector(".linkURL");

const overlayModal = document.querySelector(".overlayModal");

const modalLink = document.querySelector(".modalLink");

const inputLink = document.querySelector(".inputLinkEvento");

const btnCopiar = document.querySelector(".copiarLink");

/* URL DEL EVENTO */
const urlEvento = "<?= BASE_URL ?>/Panel/Eventos/infoEvento";

/* ABRIR MODAL */
btnCompartir.addEventListener("click", () => {
  overlayModal.classList.add("active");

  inputLink.value = urlEvento;
});

/* COPIAR LINK */
btnCopiar.addEventListener("click", async () => {
  try {
    await navigator.clipboard.writeText(inputLink.value);

    btnCopiar.innerHTML = `
      <i class="bi bi-check2"></i>
      <span class="copyL">Copiado</span>
    `;

    setTimeout(() => {
      btnCopiar.innerHTML = `
        <i class="bi bi-copy"></i>
        <span class="copyL">Copiar</span>
      `;
    }, 2000);
  } catch (error) {
    alert("No se pudo copiar");
  }
});

/* CERRAR MODAL AL HACER CLICK AFUERA */
overlayModal.addEventListener("click", (e) => {
  if (e.target === overlayModal) {
    overlayModal.classList.remove("active");
  }
});
