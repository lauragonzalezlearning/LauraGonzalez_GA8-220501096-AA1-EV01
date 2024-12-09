<?php

    session_start();
    
    include 'conexion_db.php';

    $correo = $_POST['email'];
    $contrasena = $_POST['password'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$correo' and password='$contrasena'");

    if (mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../inicio.php");
        exit;
    } else {
        echo '
            <script>
                alert("Usuario no existe por favor registrese");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }
?>