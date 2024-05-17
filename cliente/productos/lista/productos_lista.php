<?php
require_once "../../check_login.php";
require_once "productos_lista_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Lista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="lista.css">
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <main class="p-3">
        <div class="p-3">
            <h1>Listado de productos (<?php echo $numero_productos; ?>)</h1>
        </div>
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
                        <button class="btn btn-info"><a href="../../carrito/agregarProductoCarrito.php?id=<?php echo $id; ?>" class="text-white text-capitalize">comprar</a></button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="productos_lista.js"></script>
</body>

</html>
