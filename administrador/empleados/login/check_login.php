<?php
if(!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["iniciado"])) {
    $correo = $_SESSION["correo"];
    $nombre = $_SESSION["nombre"];
} else {
    // Redirect to login page or handle unauthorized access
    header("Location: /sistema/empleados/login/index.php");
    exit(); // Ensure script execution stops after redirection
}
?>