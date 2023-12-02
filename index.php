<?php
// Recuperar el mensaje de la URL
$mensaje = isset($_GET['mensaje']) ? urldecode($_GET['mensaje']) : '';

// Iniciar la sesión
session_start();

// Verificar si ya hay una sesión activa
if (isset($_SESSION['usuario'])) {
    // Si ya hay una sesión activa, redirigir a la página de inicio
    header("Location: inicio.php");
    exit();
}

// Conexión a la base de datos (reemplaza los valores con los tuyos)
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

// Lógica de autenticación
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
   

    // Consultar la base de datos para verificar las credenciales
    $sql = "SELECT id, nombre FROM usuario WHERE correo = '$correo' AND password = '$password'";
    $result = $conn->query($sql);
    echo $sql;
    if ($result->num_rows > 0) {
        // Iniciar sesión y redirigir a la página de inicio
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['nombre'];
        header("Location: tienda.php");
        exit();
    } else {
        $mensajeError = "Credenciales incorrectas";
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <title>Iniciar Sesión</title>
</head>

<body>

   

     <?php include 'plantillas/plantillaLogin.html'; ?>

    <main class="contenedor-usuario">
        <header>
            <h2 class="h2">Iniciar Sesión</h2>
        </header>
       

        <?php 
        if(!empty($mensaje)){
            echo '<div  class=" alert alert-success" role="alert">'
               .$mensaje.
       ' </div>';
        }
        ?>


        <?php if (isset($mensajeError)): ?>
            <div  class=" alert alert-danger" role="alert">
            <?php echo $mensajeError; ?>
        </div>
        <?php endif; ?>

        <form method="post" class="mb-4 form-contenedor" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
           
            <div>
                <label for="correo">Ingrese su correo:</label>
                <input class="form-input" type="email" name="correo" id="correo" placeholder="Ingrese su correo">
            </div>
            <div>
                <label for="password" class="">Ingrese su contrasena:</label>
                <input class="form-input" type="password" name="password" id="password" placeholder="Ingrese su contrasena">
            </div>
            <div class="boton-contenedor">
                
                <input type="submit" class="submit-btn" value="Ingresar">
                <a class="submit-btn" href="registrarUsuario.php">Registrarse</a>
            </div>
        </form>
    </main>


</body>

</html>