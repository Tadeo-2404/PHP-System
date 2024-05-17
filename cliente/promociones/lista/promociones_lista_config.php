<?php
require_once '../../db.php';

if(!isset($_SESSION)) {
    session_start();
}

// Consulta SQL para obtener los promociones
$sql = "SELECT id, nombre FROM promociones WHERE eliminado=0";
$result = mysqli_query($conn, $sql);
$numero_promociones = mysqli_num_rows($result);
?>