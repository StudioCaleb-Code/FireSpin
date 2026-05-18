<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $titulo; ?></title>

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap-icons.css">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

            font-family: "Quicksand", sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f5f7fb;
            color: #1f1f1f;
            overflow-x: hidden;
        }

        img {
            width: 100%;
            display: block;
        }

        /* ========================================
           HEADER
        ======================================== */

        .header {
            width: 100%;

            position: fixed;

            top: 0;
            left: 0;

            z-index: 999;

            padding: 18px 8%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: rgba(255, 255, 255, 0.9);

            backdrop-filter: blur(15px);

            border-bottom: 1px solid #ececec;
        }

        .logo {
            font-size: 30px;
            font-weight: 800;

            color: #6fa400;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .menu a {
            text-decoration: none;

            color: #444;

            font-weight: 700;

            transition: 0.3s ease;
        }

        .menu a:hover {
            color: #7fb600;
        }

        .btnLogin {
            padding: 14px 24px;

            border-radius: 14px;

            background: linear-gradient(135deg, #b7ff3c, #82c400);

            color: #294200;

            text-decoration: none;

            font-weight: 800;

            transition: 0.3s ease;

            box-shadow: 0 10px 20px rgba(122, 176, 0, 0.2);
        }

        .btnLogin:hover {
            transform: translateY(-3px) scale(1.03);
        }

        /* ========================================
           HERO
        ======================================== */

        .hero {
            width: 100%;
            min-height: 100vh;

            padding: 160px 8% 100px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;

            position: relative;

            overflow: hidden;
        }

        .hero::before {
            content: "";

            position: absolute;

            width: 700px;
            height: 700px;

            background: radial-gradient(circle, rgba(153, 218, 30, 0.25), transparent);

            top: -200px;
            right: -200px;

            border-radius: 50%;
        }

        .heroTexto {
            flex: 1;

            position: relative;
            z-index: 2;
        }

        .tagHero {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 10px 18px;

            border-radius: 50px;

            background: #efffd2;

            color: #5e8f00;

            font-weight: 700;

            margin-bottom: 25px;
        }

        .heroTexto h1 {
            font-size: 70px;

            line-height: 1.05;

            margin-bottom: 25px;
        }

        .heroTexto h1 span {
            color: #7fb600;
        }

        .heroTexto p {
            font-size: 19px;

            color: #5c5c5c;

            line-height: 1.9;

            margin-bottom: 35px;

            max-width: 700px;
        }

        .heroBtns {
            display: flex;
            align-items: center;
            gap: 20px;

            flex-wrap: wrap;
        }

        .btnHero {
            padding: 17px 30px;

            border-radius: 18px;

            text-decoration: none;

            font-weight: 800;

            transition: 0.3s ease;
        }

        .btnPrimario {
            background: linear-gradient(135deg, #b7ff3c, #7ab000);

            color: #2c4700;

            box-shadow: 0 15px 25px rgba(122, 176, 0, 0.25);
        }

        .btnPrimario:hover {
            transform: translateY(-4px);
        }

        .btnSecundario {
            border: 2px solid #99da1e;

            color: #5b8500;
        }

        .btnSecundario:hover {
            background: #99da1e;
        }

        .heroCards {
            width: 420px;

            display: flex;
            flex-direction: column;
            gap: 20px;

            position: relative;
            z-index: 2;
        }

        .heroCard {
            background: #ffffff;

            padding: 25px;

            border-radius: 28px;

            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);

            transition: 0.3s ease;
        }

        .heroCard:hover {
            transform: translateY(-6px);
        }

        .heroInfo {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .heroInfo i {
            width: 65px;
            height: 65px;

            border-radius: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #efffd8;

            color: #7fb600;

            font-size: 28px;
        }

        .heroInfo h3 {
            font-size: 24px;
            margin-bottom: 6px;
        }

        .heroInfo p {
            color: #666;
        }

        /* ========================================
           ESTADISTICAS
        ======================================== */

        .estadisticas {
            width: 100%;

            padding: 0 8% 80px;

            display: grid;

            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));

            gap: 25px;
        }

        .boxStat {
            background: #ffffff;

            padding: 30px;

            border-radius: 25px;

            text-align: center;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);

            transition: 0.3s ease;
        }

        .boxStat:hover {
            transform: translateY(-8px);
        }

        .boxStat h2 {
            font-size: 45px;

            color: #76ab00;

            margin-bottom: 10px;
        }

        .boxStat p {
            color: #666;

            font-weight: 700;
        }

        /* ========================================
           SECCIONES
        ======================================== */

        .seccion {
            padding: 100px 8%;
        }

        .tituloSeccion {
            text-align: center;

            margin-bottom: 60px;
        }

        .tituloSeccion h2 {
            font-size: 50px;

            margin-bottom: 15px;
        }

        .tituloSeccion p {
            color: #666;

            font-size: 18px;

            line-height: 1.7;
        }

        /* ========================================
           CARDS
        ======================================== */

        .cards {
            display: grid;

            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));

            gap: 30px;
        }

        .card {
            background: #ffffff;

            padding: 35px;

            border-radius: 28px;

            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);

            transition: 0.3s ease;

            position: relative;

            overflow: hidden;
        }

        .card::before {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            background: rgba(153, 218, 30, 0.1);

            border-radius: 50%;

            top: -60px;
            right: -60px;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card i {
            width: 80px;
            height: 80px;

            border-radius: 22px;

            background: #efffd8;

            color: #7ab000;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 34px;

            margin-bottom: 25px;
        }

        .card h3 {
            font-size: 26px;

            margin-bottom: 15px;
        }

        .card p {
            color: #666;

            line-height: 1.8;
        }

        /* ========================================
           CARRUSEL
        ======================================== */

        .carrusel {
            width: 100%;

            overflow: hidden;

            position: relative;
        }

        .slider {
            display: flex;

            gap: 25px;

            width: max-content;

            animation: scroll 30s linear infinite;
        }

        .slide {
            width: 350px;

            background: #ffffff;

            border-radius: 28px;

            overflow: hidden;

            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);

            transition: 0.3s ease;
        }

        .slide:hover {
            transform: translateY(-8px);
        }

        .slide img {
            height: 240px;

            object-fit: cover;
        }

        .slideInfo {
            padding: 25px;
        }

        .slideInfo h3 {
            margin-bottom: 12px;

            font-size: 24px;
        }

        .slideInfo p {
            color: #666;

            line-height: 1.7;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* ========================================
           CTA
        ======================================== */

        .cta {
            margin: 100px 8%;

            background: linear-gradient(135deg, #8bc500, #c2ff54);

            padding: 70px;

            border-radius: 40px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;

            flex-wrap: wrap;
        }

        .cta h2 {
            font-size: 50px;

            color: #243a00;

            margin-bottom: 15px;
        }

        .cta p {
            color: #355400;

            font-size: 18px;

            line-height: 1.8;
        }

        .btnCTA {
            padding: 18px 35px;

            border-radius: 18px;

            background: #ffffff;

            color: #365400;

            text-decoration: none;

            font-weight: 800;

            transition: 0.3s ease;
        }

        .btnCTA:hover {
            transform: scale(1.05);
        }

        /* ========================================
           FOOTER
        ======================================== */

        .footer {
            background: #111827;

            color: #ffffff;

            padding: 80px 8% 40px;
        }

        .footerTop {
            display: grid;

            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));

            gap: 40px;

            margin-bottom: 50px;
        }

        .footerBox h2 {
            margin-bottom: 20px;

            font-size: 28px;
        }

        .footerBox p {
            color: #c7c7c7;

            line-height: 1.8;
        }

        .footerLinks {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .footerLinks a {
            color: #d6d6d6;

            text-decoration: none;

            transition: 0.3s ease;
        }

        .footerLinks a:hover {
            color: #b8ff3c;
        }

        .visitas {
            margin-top: 20px;

            padding: 18px;

            border-radius: 18px;

            background: rgba(255, 255, 255, 0.08);

            display: flex;
            align-items: center;
            gap: 15px;
        }

        .visitas i {
            font-size: 30px;

            color: #b7ff3c;
        }

        .contador {
            font-size: 28px;
            font-weight: 800;
        }

        .footerBottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);

            padding-top: 25px;

            text-align: center;

            color: #bdbdbd;
        }

        /* ========================================
           BOTON FLOTANTE
        ======================================== */

        .btnFloat {
            position: fixed;

            right: 25px;
            bottom: 25px;

            width: 65px;
            height: 65px;

            border-radius: 50%;

            background: linear-gradient(135deg, #b7ff3c, #7ab000);

            color: #294200;

            display: flex;
            align-items: center;
            justify-content: center;

            text-decoration: none;

            font-size: 28px;

            box-shadow: 0 15px 30px rgba(122, 176, 0, 0.3);

            z-index: 999;
        }

        /* ========================================
           RESPONSIVE
        ======================================== */

        @media(max-width: 1000px) {

            .hero {
                flex-direction: column;

                text-align: center;
            }

            .heroTexto h1 {
                font-size: 50px;
            }

            .heroBtns {
                justify-content: center;
            }

            .heroCards {
                width: 100%;
            }

            .cta {
                text-align: center;
                justify-content: center;
            }
        }

        @media(max-width: 800px) {

            .menu {
                display: none;
            }

            .tituloSeccion h2 {
                font-size: 38px;
            }

            .cta h2 {
                font-size: 38px;
            }
        }

        @media(max-width: 600px) {

            .heroTexto h1 {
                font-size: 40px;
            }

            .slide {
                width: 290px;
            }

            .cta {
                padding: 40px 25px;
            }

            .cta h2 {
                font-size: 30px;
            }

            .tituloSeccion h2 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->

    <header class="header">

        <h2 class="logo">
            EMPRENDE MAS
        </h2>

        <nav class="menu">
            <a href="#">Inicio</a>
            <a href="#">Eventos</a>
            <a href="#">Sorteos</a>
            <a href="#">Premios</a>
            <a href="#">Contacto</a>
        </nav>

        <a href="<?= \App\Config\Config::baseUrl('auth/login') ?>" class="btnLogin">
            Iniciar Sesión
        </a>

    </header>

    <!-- HERO -->

    <section class="hero">

        <div class="heroTexto">

            <div class="tagHero">
                <i class="bi bi-stars"></i>
                Plataforma #1 para emprendedores
            </div>

            <h1>
                Haz crecer tu
                <span>negocio</span>
                con eventos, sorteos y clientes reales
            </h1>

            <p>
                Conecta con miles de personas, organiza campañas,
                aumenta tus ventas y lleva tu emprendimiento
                al siguiente nivel con una experiencia moderna
                y profesional.
            </p>

            <div class="heroBtns">

                <a href="#" class="btnHero btnPrimario">
                    Empezar Ahora
                </a>

                <a href="#" class="btnHero btnSecundario">
                    Ver Eventos
                </a>

            </div>

        </div>

        <div class="heroCards">

            <div class="heroCard">
                <div class="heroInfo">
                    <i class="bi bi-people-fill"></i>

                    <div>
                        <h3>+5 Usuarios</h3>
                        <p>Personas conectadas diariamente</p>
                    </div>
                </div>
            </div>

            <div class="heroCard">
                <div class="heroInfo">
                    <i class="bi bi-gift-fill"></i>

                    <div>
                        <h3>+2 Sorteos</h3>
                        <p>Eventos y premios publicados</p>
                    </div>
                </div>
            </div>

            <div class="heroCard">
                <div class="heroInfo">
                    <i class="bi bi-graph-up-arrow"></i>

                    <div>
                        <h3>Más Ventas</h3>
                        <p>Mayor alcance para tu marca</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- ESTADISTICAS -->

    <section class="estadisticas">

        <div class="boxStat">
            <h2 id="usuarios">0</h2>
            <p>Usuarios Registrados</p>
        </div>

        <div class="boxStat">
            <h2 id="eventos">0</h2>
            <p>Eventos Publicados</p>
        </div>

        <div class="boxStat">
            <h2 id="ganadores">0</h2>
            <p>Ganadores Felices</p>
        </div>

        <div class="boxStat">
            <h2 id="visitasHero">0</h2>
            <p>Visitas Totales</p>
        </div>

    </section>

    <!-- SERVICIOS -->

    <section class="seccion">

        <div class="tituloSeccion">

            <h2>
                Todo lo que necesitas
            </h2>

            <p>
                Herramientas modernas para impulsar tu emprendimiento
            </p>

        </div>

        <div class="cards">

            <div class="card">

                <i class="bi bi-calendar-event-fill"></i>

                <h3>Eventos Empresariales</h3>

                <p>
                    Publica eventos profesionales y conecta con miles
                    de usuarios interesados en tus productos o servicios.
                </p>

            </div>

            <div class="card">

                <i class="bi bi-gift-fill"></i>

                <h3>Sorteos Virales</h3>

                <p>
                    Aumenta seguidores y clientes organizando sorteos
                    atractivos con resultados transparentes.
                </p>

            </div>

            <div class="card">

                <i class="bi bi-bar-chart-fill"></i>

                <h3>Crecimiento Real</h3>

                <p>
                    Obtén estadísticas, visitas y participación
                    constante para hacer crecer tu marca.
                </p>

            </div>

        </div>

    </section>

    <!-- CARRUSEL -->

    <section class="seccion">

        <div class="tituloSeccion">

            <h2>
                Eventos Destacados
            </h2>

            <p>
                Descubre los eventos más populares del momento
            </p>

        </div>

        <div class="carrusel">

            <div class="slider">

                <div class="slide">

                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1200">

                    <div class="slideInfo">
                        <h3>Expo Emprendedores</h3>

                        <p>
                            Networking, negocios y oportunidades
                            para hacer crecer tu marca.
                        </p>
                    </div>

                </div>

                <div class="slide">

                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200">

                    <div class="slideInfo">
                        <h3>Sorteos Premium</h3>

                        <p>
                            Atrae más clientes y aumenta tu alcance
                            con campañas modernas.
                        </p>
                    </div>

                </div>

                <div class="slide">

                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1200">

                    <div class="slideInfo">
                        <h3>Capacitaciones</h3>

                        <p>
                            Aprende estrategias digitales para vender
                            mucho más.
                        </p>
                    </div>

                </div>

                <div class="slide">

                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1200">

                    <div class="slideInfo">
                        <h3>Marketing Moderno</h3>

                        <p>
                            Campañas atractivas para aumentar clientes
                            y seguidores.
                        </p>
                    </div>

                </div>

                <div class="slide">

                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200">

                    <div class="slideInfo">
                        <h3>Negocios Exitosos</h3>

                        <p>
                            Miles de emprendedores creciendo cada día
                            en la plataforma.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- CTA -->

    <section class="cta">

        <div>

            <h2>
                Empieza hoy mismo 🚀
            </h2>

            <p>
                Únete a miles de emprendedores y crea eventos,
                sorteos y campañas que atraigan clientes reales.
            </p>

        </div>

        <a href="<?= \App\Config\Config::baseUrl('auth/login') ?>" class="btnCTA">
            Crear Cuenta
        </a>

    </section>

    <!-- FOOTER -->

    <footer class="footer">

        <div class="footerTop">

            <div class="footerBox">

                <h2>
                    EMPRENDE MAS
                </h2>

                <p>
                    Plataforma moderna diseñada para emprendedores,
                    negocios y eventos digitales.
                </p>

                <div class="visitas">

                    <i class="bi bi-eye-fill"></i>

                    <div>
                        <p>Visitas Totales</p>
                        <h3 class="contador" id="contadorVisitas">
                            0
                        </h3>
                    </div>

                </div>

            </div>

            <div class="footerBox">

                <h2>
                    Navegación
                </h2>

                <div class="footerLinks">
                    <a href="#">Inicio</a>
                    <a href="#">Eventos</a>
                    <a href="#">Sorteos</a>
                    <a href="#">Contacto</a>
                </div>

            </div>

            <div class="footerBox">

                <h2>
                    Redes Sociales
                </h2>

                <div class="footerLinks">
                    <a href="#"><i class="bi bi-facebook"></i> Facebook</a>
                    <a href="#"><i class="bi bi-instagram"></i> Instagram</a>
                    <a href="#"><i class="bi bi-tiktok"></i> TikTok</a>
                    <a href="#"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                </div>

            </div>

        </div>

        <div class="footerBottom">
            © 2026 EMPRENDE MAS | Todos los derechos reservados
        </div>

    </footer>

    <!-- BOTON FLOTANTE -->

    <a href="#" class="btnFloat">
        <i class="bi bi-arrow-up"></i>
    </a>

    <script>

        /* =========================
           PAUSAR CARRUSEL
        ========================= */

        const slider = document.querySelector(".slider");

        slider.addEventListener("mouseover", () => {
            slider.style.animationPlayState = "paused";
        });

        slider.addEventListener("mouseout", () => {
            slider.style.animationPlayState = "running";
        });

        /* =========================
           CONTADOR ANIMADO
        ========================= */

        function animarNumero(id, numeroFinal) {

            let contador = 0;

            const elemento = document.getElementById(id);

            const incremento = numeroFinal / 120;

            const intervalo = setInterval(() => {

                contador += incremento;

                if (contador >= numeroFinal) {

                    contador = numeroFinal;

                    clearInterval(intervalo);
                }

                elemento.innerText = Math.floor(contador).toLocaleString();

            }, 20);
        }

        animarNumero("usuarios", 5);
        animarNumero("eventos", 8);
        animarNumero("ganadores", 12);
        animarNumero("visitasHero", 98);

        /* =========================
           CONTADOR VISITAS
        ========================= */

        let visitas = localStorage.getItem("visitasPagina");

        if (!visitas) {
            visitas = 1;
        } else {
            visitas = parseInt(visitas) + 1;
        }

        localStorage.setItem("visitasPagina", visitas);

        document.getElementById("contadorVisitas").innerText =
            parseInt(visitas).toLocaleString();

    </script>

</body>

</html>