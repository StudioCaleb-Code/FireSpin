document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const btnSubmit = document.getElementById('btnSubmit');
    const intentosSpan = document.getElementById('intentosCount');
    const errorBox = document.getElementById('errorBox');

    // Si al cargar ya no quedan intentos, bloqueamos
    if (parseInt(intentosSpan.textContent) <= 0) {
        desactivarBoton();
    }

    function desactivarBoton() {
        btnSubmit.disabled = true;
        btnSubmit.style.opacity = "0.5";
        btnSubmit.style.cursor = "not-allowed";
        
        let segundos = 30;
        const timer = setInterval(() => {
            btnSubmit.querySelector('span').innerText = `Espera ${segundos}s`;
            segundos--;
            if (segundos < 0) {
                clearInterval(timer);
                location.reload(); // Recargamos para limpiar la sesión de intentos en el server
            }
        }, 1000);
    }
});