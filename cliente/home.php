<?php
require_once "./check_login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./productos/lista/lista.css">
</head>

<body>
    <?php include_once "./navbar.php" ?>

    <main class="p-3">
        <h1>Bienvenido <?php $nombre ?></h1>
        <p>Puedes realizar compras del listado de productos y cerrar ordenes</p>
        <?php include_once "./promociones/lista/promociones_banner.php" ?>
        
        <div>
            <?php include_once "./productos/lista/productos_banner_lista.php" ?>
        </div>
    </main>

    <?php include_once "./footer.php" ?>
</body>

</html>