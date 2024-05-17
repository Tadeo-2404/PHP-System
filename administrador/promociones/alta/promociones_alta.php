<?php
require_once "../../empleados/login/check_login.php";
require_once "promociones_alta_config.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de promociones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <div class="container mt-5">
        <h1>Crear nuevo registro de promocion</h1>
        <form method="post" action="promociones_alta_config.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input placeholder="Nombre" type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input placeholder="Foto" type="file" class="form-control-file" name="foto" id="foto" accept="image/*" required>
            </div>

            <input type="submit" class="btn btn-primary" value="Guardar promocion">
        </form>
        <p id="error-message"></p>
        <a href="../lista/promociones_lista.php" class="btn btn-primary mb-3">Regresar al Listado</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="promociones_alta.js"></script>
</body>

</html>