<?php
if(!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["iniciado"])) {
    header("Location: /sistema/empleados/bienvenido.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles/estilos.css">
</head>

<body class="mt-5">
    <div class="container p-3 bg-custom-form">
        <h1 class="text-center mt-2 text-uppercase">Iniciar Sesión</h1>
        <form id="form" class="mt-4">
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" name="correo" id="correo">
            </div>

            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>
            <div id="mensaje" class="text-white m-2 p-2"></div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="index.js"></script>
</body>
</html>
