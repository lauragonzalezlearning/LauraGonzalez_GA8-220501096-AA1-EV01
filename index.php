<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: inicio.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FORMULARIO</title>
</head>
<body>
    <div class="container">
        <div class="form sign-up-container">
            <h1>REGISTRARSE</h1>
            <form action="php/register_db.php" method="POST" class="formulario">
                <input type="text" placeholder="Nombre" name="nombre" id="name">
                <input type="email" placeholder="Email" name="email" id="email">
                <input type="password" placeholder="Contraseña" name="password" id="password">
                <a class="ok-account">¿Ya tienes una cuenta?</a>
                <input type="submit" value="Registrarse">
            </form>
        </div>

        <div class="form sign-in-container">
            <h1>Iniciar sesión</h1>
            <form action="php/login_usuario.php" method="POST" class="formulario2">
                <input type="email" name="email" placeholder="Email" id="email2">
                <input type="password" name="password" placeholder="Contraseña" id="password2">
                <a class="no-account">¿Aun no tienes cuenta?</a>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>
    </div>
    <p class="notify check_notify">¡TE REGISTRASTE CORRECTAMENTE</p>
    <p class="notify error_notify">¡UPPs! ocurrió un error, por favor verifica tus datos</p>
    <script src="js/script.js"></script>
</body>
</html>