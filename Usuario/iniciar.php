<?php
// Iniciar la sesión
session_start();

// Verificar si ya hay una sesión activa
if (isset($_SESSION['usuario'])) {
    // Si ya hay una sesión activa, redirigir a la página de inicio
    header("Location: inicio.php");
    exit();
}

// Lógica de autenticación
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombreUsuario = $_POST['nombreUsuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales (esto puede variar según tu lógica de autenticación)
    if ($nombreUsuario === 'usuario' && $contrasena === 'contrasena') {
        // Guardar el nombre de usuario en la sesión
        $_SESSION['usuario'] = $nombreUsuario;

        // Redirigir a la página de inicio después de la autenticación
        header("Location: inicio.php");
        exit();
    } else {
        $mensajeError = "Credenciales incorrectas";
    }
}
?>