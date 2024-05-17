<?php
if(!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["iniciado"])) {
    $correo = $_SESSION["correo"];
} else {
    // Redirect to login page or handle unauthorized access
    header("Location: /sistema/usuarios/login/home.php");
    exit(); // Ensure script execution stops after redirection
}
?>