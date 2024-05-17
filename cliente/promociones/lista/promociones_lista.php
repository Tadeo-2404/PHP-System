<?php 
require_once "../../usuarios/login/check_login.php";
require_once "promociones_lista_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones Lista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <main class="p-3">
        <table id="listapromociones" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ver detalle</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los datos de los promociones en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr id='promocion_{$row['id']}'>"; // Añadimos el ID único a la fila
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['nombre']}</td>";
                    // Botones para ver detalle, editar y eliminar
                    echo "<td><button type='button' class='btn btn-info'><a href='../detalle/promociones_detalle.php?id={$row['id']}' class='text-white'>Ver detalle</a></button></td>";
                    echo "<td><button type='button' class='btn btn-info'><a href='../editar/editar_promocion.php?id={$row['id']}' class='text-white'>Editar</a></button></td>";
                    echo "<td><button type='button' class='btn btn-danger eliminarPromocion' data-id='{$row['id']}' onclick='eliminarPromocion({$row['id']})'>Eliminar</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="promociones_lista.js"></script>
</body>

</html>