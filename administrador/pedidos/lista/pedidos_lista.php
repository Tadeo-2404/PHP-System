<?php 
require_once "../../empleados/login/check_login.php";
require_once "pedidos_lista_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Lista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../../navbar.php" ?>

    <main class="p-3">
        <div class="p-3">
            <h1>Listado de pedidos (<?php echo $numero_pedidos; ?>)</h1>
        </div>
        <table id="listapedidos" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Ver detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr id='pedido_{$row['id']}'>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['fecha']}</td>";
                    echo "<td><button type='button' class='btn btn-info'><a href='../detalle/pedidos_detalle.php?id={$row['id']}' class='text-white'>Ver detalle</a></button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="pedidos_lista.js"></script>
</body>

</html>