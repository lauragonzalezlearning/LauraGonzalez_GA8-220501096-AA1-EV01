<?php
    include 'conexion_db.php';

    $nombre_usuario = $_POST['nombre'];
    $correo = $_POST['email'];
    $contrasena = $_POST['password'];

    $query = "INSERT INTO usuarios(nombre,email,password) 
              VALUES('$nombre_usuario','$correo','$contrasena')";
              

    $check_email = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$correo'");

    if(mysqli_num_rows($check_email) > 0) {
        echo '
            <script>
                alert("Este correo ya esta en uso por favor utilize otro");
                window.location = "../index.php";
            </script>
        ';

        exit();
    }

    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Usuario no almacenado ocurrio un error");
                window.location = "../index.php";
            </script>
        ';
    }

    mysqli_close($conexion);

?>