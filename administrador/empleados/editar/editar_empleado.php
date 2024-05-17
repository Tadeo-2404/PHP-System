<?php 
require_once "../login/check_login.php";
require_once "./editar_empleado_config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <main class="container m-5">
        <h1>Edición de Empleado</h1>
        <form action="editar_empleado_config.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $row['apellidos']; ?>">
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>">
                <div id="correo-error"></div>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select class="form-control" name="rol" id="rol">
                    <option value="Gerente" <?php if ($row['rol'] == 'Gerente') echo ' selected'; ?>>Gerente</option>
                    <option value="Ejecutivo" <?php if ($row['rol'] == 'Ejecutivo') echo ' selected'; ?>>Ejecutivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" <?php if ($row['status'] == 1) echo 'selected'; ?>>Activo</option>
                    <option value="0" <?php if ($row['status'] == 0) echo 'selected'; ?>>Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <?php if (!empty($row['archivo_nombre'])) : ?>
                    <p>Archivo actual: <?php echo $row['archivo_nombre']; ?></p>
                <?php endif; ?>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" id="guardarEmpleado" value="Guardar">
        </form>
        <a href="../lista/empleados_lista.php" class="btn btn-primary mt-3">Regresar al Listado</a>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="./editar_empleado.js"></script>
</body>
</html>