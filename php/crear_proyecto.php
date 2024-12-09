<?php
include 'conexion_db.php';
session_start();

$nombre_proyecto = $_POST['nombre_proyecto'];
$asunto_proyecto = $_POST['asunto_proyecto'];
$temas_proyecto = $_POST['temas_proyecto'];
$autoridad_proyecto = $_POST['autoridad_proyecto'];

$usuario = $_SESSION['usuario'];
$usuario_id_result = mysqli_query($conexion, "SELECT id FROM usuarios WHERE email='$usuario'");
$usuario_id = mysqli_fetch_assoc($usuario_id_result)['id'];

$query = "INSERT INTO proyectos (nombre_proyecto, asunto_proyecto, temas_proyecto, autoridad_proyecto, usuario_id) 
          VALUES ('$nombre_proyecto', '$asunto_proyecto', '$temas_proyecto', '$autoridad_proyecto', '$usuario_id')";

if (mysqli_query($conexion, $query)) {
    echo '
        <script>
            alert("Proyecto creado exitosamente");
            window.location = "../inicio.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al crear proyecto");
            window.location = "../inicio.php";
        </script>
    ';
}

mysqli_close($conexion);
?>
