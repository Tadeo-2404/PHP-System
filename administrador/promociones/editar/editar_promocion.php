<?php 
require_once "../../empleados/login/check_login.php";
require_once "./editar_promocion_config.php";

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
    <title>Edición de promocion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <main class="container m-5">
        <h1>Edición de promocion</h1>
        <form action="./editar_promocion_config.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" id="guardarpromocion" value="Guardar">
            <p id="error-message"></p>
        </form>
        <a href="../lista/promociones_lista.php" class="btn btn-primary mt-3">Regresar al Listado</a>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="./editar_promocion.js"></script>
</body>
</html>