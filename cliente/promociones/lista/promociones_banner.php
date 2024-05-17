<?php
require_once './db.php';

// Check if session is not already started
if (!isset($_SESSION)) {
    session_start();
}

// SQL query to retrieve a random promotion ID
$sql_random_id = "SELECT id FROM promociones WHERE eliminado = 0 ORDER BY RAND() LIMIT 1";

// Execute the query to get a random ID
$result_random_id = mysqli_query($conn, $sql_random_id);

// Check if query was successful
if (!$result_random_id) {
    // Handle the case where the query fails
    echo "Ha ocurrido un error: " . mysqli_error($conn);
    exit;
}

// Fetch the random ID from the result set
$row_random_id = mysqli_fetch_assoc($result_random_id);
$id = $row_random_id['id'];

// SQL query to retrieve the promotion with the random ID
$sql = "SELECT * FROM promociones WHERE id = $id";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    // Handle the case where the query fails
    echo "Error obteniendo la promocion: " . mysqli_error($conn);
    exit;
}

// Check if a promotion with the random ID exists
if (mysqli_num_rows($result) == 0) {
    echo "Promocion no encontrada";
    exit;
}

$row = mysqli_fetch_assoc($result);

?>

<div class="text-center">
    <h2 class="text-capitalize">promocion del dia</h2>
    <img src="../../../sistema/carpeta-fotos/<?php echo $row['archivo']; ?>" class="img-fluid mx-auto d-block" alt="Foto de promociones" style="max-width: 600px; max-height: 300px; margin-bottom: 100px;" width="600px" height="300px">
</div>

