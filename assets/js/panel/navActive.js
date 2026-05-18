document.addEventListener("DOMContentLoaded", () => {

    const links = document.querySelectorAll(".linkNav");

    const currentPath = window.location.pathname;

    links.forEach(link => {

        const linkPath = new URL(link.href).pathname;

        /* SOLO EL EXACTO */
        if(currentPath === linkPath){

            link.classList.add("active");

        }else{

            link.classList.remove("active");

        }

    });

});