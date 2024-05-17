<?php
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    // Query to select user with matching email
    $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $row = mysqli_fetch_assoc($result);

        // Verify hashed password
        if ($pass == $row['pass']) {
            // Password is correct
            session_start();
            $_SESSION["iniciado"] = true;
            $_SESSION["correo"] = $correo;
            $_SESSION["nombre"] = $row['nombre'];
            $_SESSION["id"] = $row['id'];

            echo 'existe';
        } else {
            // Password is incorrect
            echo 'La contraseña es incorrecta';
        }
    } 
}

mysqli_close($conn);
?>
