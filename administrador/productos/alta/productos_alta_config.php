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
$nombre = $codigo = $descripcion = $costo = $stock = '';
$error = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $costo = mysqli_real_escape_string($conn, $_POST['costo']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);

    // Validar los datos (puedes agregar más validaciones según tus requerimientos)
    if (empty($nombre) || empty($codigo) || empty($descripcion) || empty($costo) || empty($stock)) {
        $error = "Todos los campos son obligatorios.";
    } else {
        $codigo_existente = mysqli_query($conn, "SELECT * FROM productos WHERE codigo='$codigo'");
        if (mysqli_num_rows($codigo_existente) > 0) {
            $error = "El codigo $codigo ya existe.";
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
                    $pass_encriptada = password_hash($pass, PASSWORD_DEFAULT); // Encriptar contraseña
                    $sql = "INSERT INTO productos (nombre, codigo, descripcion, costo, stock, archivo_n, archivo) VALUES ('$nombre', '$codigo', '$descripcion', '$costo', '$stock', '$nombre_real_foto', '$nombre_encriptado_foto')";
                    if (mysqli_query($conn, $sql)) {
                        header("Location: ../lista/productos_lista.php");
                        exit;
                    } else {
                        $error = "Error al insertar el producto: " . mysqli_error($conn);
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
