<?php
// Iniciar la sesión
session_start();

// Verificar si no hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    // Si no hay una sesión activa, redirigir a la página de inicio de sesión
    header("Location: index.php");
    exit();
}
?>