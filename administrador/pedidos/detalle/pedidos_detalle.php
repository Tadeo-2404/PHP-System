<?php
require_once "../../empleados/login/check_login.php";
require_once "pedidos_detalle_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de pedido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include_once "../../navbar.php" ?>
    <div class="container mt-5">
        <h1>Detalle de pedido</h1>
        <div>
            <p><strong>ID:</strong> <?php echo $id; ?></p>
            <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
            <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col" class="text-center">Cantidad</th>
                    <th scope="col" class="text-center">Precio</th>
                    <th scope="col" class="text-center">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['nombre_producto']; ?></td>
                    <td><?php echo $product['descripcion']; ?></td>
                    <td class="text-center"><?php echo $product['cantidad']; ?></td>
                    <td class="text-right"><?php echo number_format($product['precio'], 2); ?></td>
                    <td class="text-right"><?php echo number_format($product['cantidad'] * $product['precio'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-right">Total:</td>
                    <td class="text-right"><?php echo number_format($total, 2); ?></td>
                </tr>
            </tbody>
        </table>
        </div>
        <a href="../lista/pedidos_lista.php" class="btn btn-primary">Regresar al Listado</a>
    </div>
</body>

</html>