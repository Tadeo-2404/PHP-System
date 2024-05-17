<?php
require_once '../../db.php';

// Función para crear la carpeta si no existe
function crearCarpetaFotos($carpeta) {
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
}

// Variables para almacenar los datos del formulario
$nombre = $apellidos = $correo = $pass = $rol = '';
$error = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $rol = mysqli_real_escape_string($conn, $_POST['rol']);
    
    // Validar los datos (puedes agregar más validaciones según tus requerimientos)
    if (empty($nombre) || empty($apellidos) || empty($correo) || empty($pass) || empty($rol)) {
        $error = "Todos los campos son obligatorios.";
    } else {
        // Validar el correo electrónico
        $correo_existente = mysqli_query($conn, "SELECT correo FROM empleados WHERE correo='$correo'");
        if (mysqli_num_rows($correo_existente) > 0) {
            $error = "El correo $correo ya existe.";
        } else {
            // Subir foto
            if ($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
                $nombre_real_foto = $_FILES["foto"]["name"];
                $nombre_encriptado_foto = md5(uniqid(rand(), true)) . '.' . pathinfo($nombre_real_foto, PATHINFO_EXTENSION);
                $ruta_carpeta_fotos = "../../carpeta-fotos/";
                $ruta_foto = $ruta_carpeta_fotos . $nombre_encriptado_foto;
                
                // Mover el archivo
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    // Crear la carpeta si no existe
                    crearCarpetaFotos($ruta_carpeta_fotos);
                    
                    // Insertar los datos en la base de datos
                    $pass_encriptada = password_hash($pass, PASSWORD_DEFAULT); // Encriptar contraseña
                    $sql = "INSERT INTO empleados (nombre, apellidos, correo, pass, rol, archivo_nombre, archivo_file) VALUES ('$nombre', '$apellidos', '$correo', '$pass_encriptada', '$rol', '$nombre_real_foto', '$nombre_encriptado_foto')";
                    if (mysqli_query($conn, $sql)) {
                        header("Location: ../lista/empleados_lista.php");
                        exit;
                    } else {
                        $error = "Error al insertar el empleado: " . mysqli_error($conn);
                    }
                } else {
                    $error = "Error al mover el archivo.";
                }
            } else {
                $error = "Error al subir el archivo: " . $_FILES["foto"]["error"];
            }
        }
    }
}
?>
