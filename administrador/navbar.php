<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Navigation items -->
    <a class="navbar-brand" href="#">Menú</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navigation links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/sistema/empleados/bienvenido.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="d-flex nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" style="gap: 10px;" href="/sistema/empleados/lista/empleados_lista.php">
                    <i class="fa-solid fa-user text-white"></i>
                    <p class="m-0">Empleados</p>
                </a>
            </li>
            <li class="d-flex nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" style="gap: 10px;" href="/sistema/productos/lista/productos_lista.php">
                    <i class="fa-solid fa-store text-white"></i>
                    <p class="m-0">Productos</p>
                </a>
            </li>
            <li class="d-flex nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" style="gap: 10px;" href="/sistema/promociones/lista/promociones_lista.php">
                    <i class="fa-solid fa-percent text-white"></i>
                    <p class="m-0">Promociones</p>
                </a>
            </li>
            <li class="d-flex nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" style="gap: 10px;" href="/sistema/pedidos/lista/pedidos_lista.php">
                    <i class="fa-solid fa-truck text-white"></i>
                    <p class="m-0">Pedidos</p>
                </a>
            </li>
        </ul>

        <!-- User information and logout button -->
        <?php
        if (isset($_SESSION["nombre"])) {
            echo '<span class="navbar-text mr-3 text-light">Bienvenido ' . $_SESSION["nombre"] . '</span>';
        } else {
            echo '<span class="navbar-text mr-3 text-light">Bienvenido Usuario</span>';
        }
        ?>
        <button id="logout-btn" class="btn btn-danger my-2 my-sm-0">Cerrar Sesión</button>
    </div>
</nav>
<script src="/sistema/empleados/logout/logout.js"></script>