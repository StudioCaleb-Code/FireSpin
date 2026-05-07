<div class="dashboard-content">
    <div class="welcome-banner">
        <h1>Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h1>
        <p>Este es el resumen de **EMPRENDEMAS** para hoy.</p>
    </div>

    <div class="stats-grid"
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
        <div class="card"
            style="background: white; padding: 20px; border-radius: 10px; shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3>Participantes</h3>
            <p style="font-size: 2rem; font-weight: bold; color: #4e73df;">150</p>
        </div>
        <div class="card"
            style="background: white; padding: 20px; border-radius: 10px; shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3>Eventos Activos</h3>
            <p style="font-size: 2rem; font-weight: bold; color: #1cc88a;">12</p>
        </div>
        <div class="card"
            style="background: white; padding: 20px; border-radius: 10px; shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3>Premios Entregados</h3>
            <p style="font-size: 2rem; font-weight: bold; color: #f6c23e;">45</p>
        </div>
    </div>
</div>

<div class="card">
    <h3>¿Quieres ver más?</h3>
    <p>Haz clic en el botón para ver los detalles adicionales.</p>

    <!-- El link apunta a: BASE_URL / Carpeta / Controlador / Método -->
    <a href="<?= BASE_URL ?>/Panel/Dashboard/detalles" class="btn">
        Ver más detalles
    </a>
</div>