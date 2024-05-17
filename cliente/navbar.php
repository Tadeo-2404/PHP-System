<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <!-- Navigation items -->
    <a class="navbar-brand" href="#">Menú</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navigation links -->
        <ul class="navbar-nav mr-auto">
            <li class="d-flex nav-item active w-100">
                <a class="nav-link d-flex justify-content-between align-items-center" style="gap: 10px;" href="/usuario/home.php">
                    <i class="fa-solid fa-house text-white"></i>
                    <p class="m-0">Home</p>
                </a>
            </li>
            <li class="d-flex nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" style="gap: 10px;" href="/usuario/productos/lista/productos_lista.php">
                    <i class="fa-solid fa-store text-white"></i>
                    <p class="m-0">Productos</p>
                </a>
            </li>
            <li class="d-flex nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" style="gap: 10px;" href="/usuario/contacto/contacto.php">
                    <i class="fa-solid fa-envelope text-white"></i>
                    <p class="m-0">Contacto</p>
                </a>
            </li>
            <li class="d-flex nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" style="gap: 10px;" href="/usuario/carrito/carrito.php">
                    <i class="fa-solid fa-cart-shopping text-white"></i>
                    <p class="m-0">Carrito</p>
                </a>
            </li>
        </ul>

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
<script src="./logout/logout.js"></script>