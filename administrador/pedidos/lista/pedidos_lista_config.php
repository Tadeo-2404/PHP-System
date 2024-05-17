<?php
require_once '../../db.php';

if(!isset($_SESSION)) {
    session_start();
}

// Consulta SQL para obtener los pedidos
$sql = "SELECT * FROM pedidos WHERE status=1";
$result = mysqli_query($conn, $sql);
$numero_pedidos = mysqli_num_rows($result);
?>