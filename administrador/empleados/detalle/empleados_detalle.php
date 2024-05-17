<?php
require_once "../login/check_login.php";
require_once "empleados_detalle_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../../navbar.php" ?>
    <div class="container mt-5">
        <h1>Detalle de Empleado</h1>
        <div>
            <?php if (!empty($archivo_nombre)) : ?>
                <img src="<?php echo $ruta_foto; ?>" class="img-fluid" alt="Foto de perfil">
            <?php endif; ?>
            <p><strong>Nombre Completo:</strong> <?php echo $nombreCompleto; ?></p>
            <p><strong>Correo:</strong> <?php echo $correo; ?></p>
            <p><strong>Rol:</strong> <?php echo $rol; ?></p>
            <div class="form-group">
                <p><strong>Status:</strong> <?php if ($status == 1) : ?>Activo<?php elseif ($status == 0) : ?>Inactivo<?php endif; ?></p>
            </div>
        </div>
        <a href="../lista/empleados_lista.php" class="btn btn-primary">Regresar al Listado</a>
    </div>
</body>

</html>