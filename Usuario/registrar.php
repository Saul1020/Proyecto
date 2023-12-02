<?php



// Conexión a la base de datos (reemplaza los valores con los de tu configuración)
$server = "localhost";
$user = "root";
$password = "";
$dataBase = "tienda";

//1. Establecer la conexión
$conn = mysqli_connect($server, $user, $password, $dataBase);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$primerApellido = $_POST['primerApellido'];
$segunApellido = $_POST['segunApellido'];
$mobile = $_POST['mobile'];
$correo = $_POST['correo'];
$password = $_POST['password'];

// Insertar datos en la tabla
$sql = "INSERT INTO usuario (nombre, primerApellido, segunApellido, correo, telefono, password)
             VALUES ('$nombre', '$primerApellido', '$segunApellido', '$correo','$mobile','$password')";

//Se retorna al inicirar sesion con un mensaje
if ($conn->query($sql) === TRUE) {
    $mensaje ="Usuario registrado con correctamente";
    header("Location: ../index.php?mensaje=" . urlencode($mensaje));
   
} else {
    $mensaje ="Error al registrar al usuario". $conn->error;
    header("Location: ../index.php?mensaje=" . urlencode($mensaje));
}




// Cerrar la conexión
$conn->close();
?>

