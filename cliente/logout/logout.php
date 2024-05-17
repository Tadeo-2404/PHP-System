<?php
if(!isset($_SESSION)) {
    session_start();
}

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header("Location: ../login/index.php");
exit(); // Ensure script execution stops after redirection
?>