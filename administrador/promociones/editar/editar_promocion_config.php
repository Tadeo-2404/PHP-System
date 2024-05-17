<?php
require_once '../../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    // Verificar si se proporcionó una nueva foto
    if (!empty($_FILES['fileToUpload']['name'])) {
        // Subir la nueva foto
        $nombre_real_foto = $_FILES["fileToUpload"]["name"];
        $nombre_encriptado_foto = md5(uniqid(rand(), true)) . '.' . pathinfo($nombre_real_foto, PATHINFO_EXTENSION);
        $ruta_carpeta_fotos = "../../carpeta-fotos/";
        $ruta_foto = $ruta_carpeta_fotos . $nombre_encriptado_foto;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $ruta_foto);

        // Actualizar la base de datos con la nueva foto
        $sql = "UPDATE promociones SET nombre='$nombre', archivo='$nombre_encriptado_foto' WHERE id=$id";
    } else {
        // No se proporcionó una nueva foto, actualizar solo los demás campos
        $sql = "UPDATE promociones SET nombre='$nombre' WHERE id=$id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: ../lista/promociones_lista.php");
    } else {
        echo 'Error al actualizar el producto.';
    }
} elseif (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM promociones WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Extraer cada valor del array
        $id = $row['id'];
        $nombre = $row['nombre'];
        $status = $row['status'];
        $eliminado = $row['eliminado'];
    } else {
        // Si no se encuentra el producto, redirigir al listado
        header("Location: ../lista/promociones_lista.php");
        exit;
    }
} else {
    // Si no se proporciona un ID, redirigir al listado
    header("Location: ../lista/promociones_lista.php");
    exit;
}
