<?php
require_once '../../db.php';

if(!isset($_SESSION)) {
    session_start();
}

// Consulta SQL para obtener los empleados
$sql = "SELECT id, CONCAT(nombre, ' ', apellidos) AS nombre_completo, correo, rol FROM empleados WHERE eliminado=0";
$result = mysqli_query($conn, $sql);
$numero_empleados = mysqli_num_rows($result);
?>