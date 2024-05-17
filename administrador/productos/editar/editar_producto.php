<?php 
require_once "../../empleados/login/check_login.php";
require_once "./editar_producto_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_SERVER["REQUEST_METHOD"];
    var_dump($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <main class="container m-5">
        <h1>Edición de producto</h1>
        <form action="./editar_producto_config.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>

            <div class="form-group">
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $codigo; ?>">
                <p id="error-message-codigo"></p>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion"><?php echo $descripcion ?></textarea>
            </div>

            <div class="form-group">
                <label for="costo">Costo:</label>
                <input type="number" class="form-control" name="costo" id="costo" value="<?php echo $costo; ?>">
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $stock; ?>">
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <?php if (!empty($row['archivo_n'])) : ?>
                    <p>Archivo actual: <?php echo $row['archivo_n']; ?></p>
                <?php endif; ?>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" id="guardarProducto" value="Guardar">
            <p id="error-message"></p>
        </form>
        <a href="../lista/productos_lista.php" class="btn btn-primary mt-3">Regresar al Listado</a>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="./editar_producto.js"></script>
</body>
</html>