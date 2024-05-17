<?php
require_once '../../db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT nombre, codigo, descripcion, costo, stock, archivo FROM productos WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombre'];
        $codigo = $row['codigo'];
        $descripcion = $row["descripcion"];
        $costo = $row["costo"];
        $stock = $row['stock'];
        $archivo_n = $row['archivo']; // Cambiar archivo_nombre por archivo_file
        $ruta_foto = "../../carpeta-fotos/" . $archivo_n;
    } else {
        // Si no se encuentra el empleado, redirigir al listado
        header("Location: ../lista/productos_lista.php");
        exit;
    }
} else {
    // Si no se proporciona un ID, redirigir al listado
    header("Location: ../lista/productos_lista.php");
    exit;
}
?>
