<?php
require_once '../../db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM empleados WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nombreCompleto = $row['nombre'] . ' ' . $row['apellidos'];
        $correo = $row['correo'];
        $rol = $row['rol'];
        $status = $row['status'];
        $archivo_nombre = $row['archivo_file']; // Cambiar archivo_nombre por archivo_file
        $ruta_foto = "../../carpeta-fotos/" . $archivo_nombre;
    } else {
        // Si no se encuentra el empleado, redirigir al listado
        header("Location: empleados_lista.php");
        exit;
    }
} else {
    // Si no se proporciona un ID, redirigir al listado
    header("Location: empleados_lista.php");
    exit;
}
?>
