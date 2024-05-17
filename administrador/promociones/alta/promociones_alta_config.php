<?php
require_once '../../db.php';

// Función para crear la carpeta si no existe
function crearCarpetaFotos($carpeta)
{
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
}

// Variables para almacenar los datos del formulario
$nombre = '';
$error = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);


    // Validar los datos
    if (empty($nombre)) {
        $error = "Todos los campos son obligatorios.";
    } else {
        // Subir foto
        if ($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
            $nombre_real_foto = $_FILES["foto"]["name"];
            $nombre_encriptado_foto = md5(uniqid(rand(), true)) . '.' . pathinfo($nombre_real_foto, PATHINFO_EXTENSION);
            $ruta_carpeta_fotos = "../../carpeta-fotos/";
            $ruta_foto = $ruta_carpeta_fotos . $nombre_encriptado_foto;

            // Crear la carpeta si no existe
            crearCarpetaFotos($ruta_carpeta_fotos);

            // Mover el archivo
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                // Insertar los datos en la base de datos
                $sql = "INSERT INTO promociones (nombre, archivo) VALUES ('$nombre', '$nombre_encriptado_foto')";
                if (mysqli_query($conn, $sql)) {
                    header("Location: ../lista/promociones_lista.php");
                    exit;
                } else {
                    $error = "Error al insertar la promocion: " . mysqli_error($conn);
                }
            } else {
                $error = "Error al mover el archivo.";
            }
        } else {
            $error = "Error al subir el archivo: " . $_FILES["foto"]["error"];
        }
    }
}
