<?php
require_once "./check_login.php";
require_once "productos_banner_lista_config.php";
?>
<div class="row">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $nombre = $row['nombre'];
        $codigo = $row['codigo'];
        $costo = $row["costo"];
        $archivo_n = $row['archivo'];
        $ruta_foto = "../../../sistema/carpeta-fotos/" . $archivo_n;
    ?>
        <div class="col-md-4">
            <div class="producto-container text-center text-capitalize">
                <img src="<?php echo $ruta_foto; ?>" class="img-fluid producto-img" alt="Foto de producto">
                <h2><a href="../detalle/productos_detalle.php?id=<?php echo $id; ?>" class="text-dark"><?php echo $nombre; ?></a></h2>
                <p>codigo: <?php echo $codigo; ?></p>
                <p>$<?php echo $costo; ?></p>
                <button class="btn btn-info"><a href="/usuario/carrito/agregarProductoCarrito.php?id=<?php echo $id; ?>" class="text-white text-capitalize">comprar</a></button>
            </div>
        </div>
    <?php } ?>
</div>