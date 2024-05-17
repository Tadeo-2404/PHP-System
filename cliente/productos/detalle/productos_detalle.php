<?php
require_once "../../check_login.php";
require_once "productos_detalle_config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include_once "../../navbar.php" ?>
    <div class="container mt-5">
        <h1>Detalle de Producto</h1>
        <div>
            <?php if (!empty($archivo_n)): ?>
                <img src="<?php echo $ruta_foto; ?>" class="img-fluid" alt="Foto de producto">
            <?php endif; ?>
            <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
            <p><strong>Codigo:</strong> <?php echo $codigo; ?></p>
            <p><strong>Descripcion:</strong> <?php echo $descripcion; ?></p>
            <p><strong>Stock:</strong> <?php echo $stock; ?></p>
            <p><strong>Costo:</strong> <?php echo $costo; ?></p>
        </div>
        <a href="../lista/productos_lista.php" class="btn btn-info">Regresar al Listado</a>
    </div>
</body>
</html>

