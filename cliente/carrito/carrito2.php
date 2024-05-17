<?php
require_once "../check_login.php";
require_once "carrito_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include_once "../navbar.php" ?>
    <div class="container mt-5">
        <h1>Cerrar Orden</h1>
        <p>Para cerrar tu orden, visualiza los productos, una vez confirmado, da click en guardar</p>
        <div>
            <p><strong>ID de la Orden:</strong> <?php echo $id; ?></p>
            <p><strong>Fecha de la Orden:</strong> <?php echo $fecha; ?></p>

            <form action="cerrarPedido.php" method="post">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre Producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col" class="text-center">Cantidad</th>
                            <th scope="col" class="text-center">Costo</th>
                            <th scope="col" class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?php echo $product['nombre_producto']; ?></td>
                                <td><?php echo $product['descripcion']; ?></td>
                                <td class="text-right"><?php echo $product['cantidad']; ?></td>
                                <td class="text-right"><?php echo $product['costo'] ?></td>
                                <td class="text-right"><?php echo number_format($product['cantidad'] * $product['precio'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="text-right">Total:</td>
                            <td class="text-right"><?php echo number_format($total, 2); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <a href="carrito.php" class="btn btn-info">Regresar</a>
                    <input class="btn btn-info" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>