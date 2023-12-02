<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Registrarme</title>
</head>

<body>

    <?php include 'plantillas/plantillaLogin.html'; ?>

    <main class="contenedor-usuario">
        <header>
            <h2 class="h2">Registrarme</h2>
        </header>

        <form action="Usuario/registrar.php" class="mb-4 form-contenedor" method="post">
            <div>
                <label for="nombre">Ingrese su nombre:</label>
                <input class="form-input" type="text" name="nombre" id="nombre" required placeholder="Ingrese su nombre">
            </div>
            <div>
                <label for="primerApellido">Ingrese su primer apellido:</label>
                <input class="form-input" type="text" name="primerApellido" required id="primerApellido" placeholder="Ingrese su primer apellido">
            </div>
            <div>
                <label for="segunApellido">Ingrese su segundo apellido:</label>
                <input class="form-input" type="text" name="segunApellido" required id="segunApellido" placeholder="Ingrese su segundo apellido">
            </div>
            <div>
                <label for="mobile">Ingrese su numero:</label>
                <input class="form-input" type="number" name="mobile" id="mobile" required placeholder="Ingrese su numero">
            </div>
            <div>
                <label for="correo">Ingrese su correo:</label>
                <input class="form-input" type="email" name="correo" id="correo" required placeholder="Ingrese su correo">
            </div>
            <div>
                <label for="password" class="">Ingrese su contrasena:</label>
                <input class="form-input" type="password" name="password" id="password" required placeholder="Ingrese su contrasena">
            </div>
            <div class="boton-contenedor">
                <input type="submit" class="submit-btn" value="Registrar">
            </div>
        </form>
    </main>


</body>

</html>