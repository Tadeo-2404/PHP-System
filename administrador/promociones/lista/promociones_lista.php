<?php 
require_once "../../empleados/login/check_login.php";
require_once "promociones_lista_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones Lista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <main class="p-3">
        <div class="p-3">
            <h1>Listado de promociones (<?php echo $numero_promociones; ?>)</h1>
            <a href="../alta/promociones_alta.php" class='btn btn-primary mt-2'>Crear nueva promocion</a>
        </div>
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
                    echo "<td><button type='button' class='btn btn-primary'><a href='../editar/editar_promocion.php?id={$row['id']}' class='text-white'>Editar</a></button></td>";
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