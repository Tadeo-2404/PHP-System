<?php
require_once "../login/check_login.php";
require_once "empleados_alta_config.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <div class="container mt-5">
        <h1>Crear nuevo registro de empleado</h1>
        <form method="post" action="empleados_alta_config.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input placeholder="Nombre" type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input placeholder="Apellidos" type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>">
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input placeholder="Correo" type="email" class="form-control" name="correo" id="correo" value="<?php echo $correo; ?>">
                <div id="correo-error"></div>
            </div>

            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input placeholder="Contraseña" type="password" class="form-control" name="pass" id="pass">
            </div>

            <div class="form-group">
                <label for="rol">Rol:</label>
                <select class="form-control" name="rol" id="rol">
                    <option value="Gerente" <?php if ($rol == 'Gerente') echo ' selected'; ?>>Gerente</option>
                    <option value="Ejecutivo" <?php if ($rol == 'Ejecutivo') echo ' selected'; ?>>Ejecutivo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" name="foto" id="foto" accept="image/*" required>
            </div>

            <input type="submit" class="btn btn-primary" value="Guardar">
        </form>
        <p id="error-message"></p>
        <a href="../lista/empleados_lista.php" class="btn btn-primary mb-3">Regresar al Listado</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="empleados_alta.js"></script>
</body>

</html>