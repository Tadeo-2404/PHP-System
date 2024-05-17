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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once "../navbar.php" ?>
    <div class="container mt-5">
        <h1>Mis productos</h1>
        <p>Añade los productos que desees para cerrar una orden</p>
        <?php         
        if(!isset($_SESSION['id_pedido'])) {
            // Si no hay un pedido iniciado
            echo "<div>";
            echo "<h3>Compra un producto para iniciar un pedido</h3>";
            echo "</div>";
        } else {
            // Si hay un pedido iniciado
            echo "<div>";
            echo "<p><strong>ID de la Orden:</strong> $id</p>";
            echo "<p><strong>Fecha de la Orden:</strong> $fecha</p>";
            echo "<form action='actualizarCantidadCarrito.php' method='post'>";
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th scope='col'>Nombre Producto</th>";
            echo "<th scope='col'>Descripción</th>";
            echo "<th scope='col' class='text-center'>Cantidad</th>";
            echo "<th scope='col' class='text-center'>Costo</th>";
            echo "<th scope='col' class='text-center'>Subtotal</th>";
            echo "<th scope='col' class='text-center'>Eliminar</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>{$product['nombre_producto']}</td>";
                echo "<td>{$product['descripcion']}</td>";
                echo "<td class='text-right'>";
                echo "<input class='w-100' type='number' name='cantidad[]' id='cantidad' min='1' max='{$product['stock']}' value='{$product['cantidad']}'>";
                echo "</td>";
                echo "<td class='text-right'>{$product['costo']}</td>";
                echo "<td class='text-right'>" . number_format($product['cantidad'] * $product['precio'], 2) . "</td>";
                echo "<td><a href='eliminarProductoCarrito.php?id={$product['id']}' class='btn btn-danger text-white w-100'>Eliminar</a></td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td colspan='4' class='text-right'>Total:</td>";
            echo "<td class='text-right'>" . number_format($total, 2) . "</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<input class='btn btn-info' type='submit' value='Continuar'>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>
