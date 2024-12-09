<?php
include 'conexion_db.php';
session_start();

$id = $_POST['id'];
$nombre_proyecto = $_POST['nombre_proyecto'];
$asunto_proyecto = $_POST['asunto_proyecto'];
$temas_proyecto = $_POST['temas_proyecto'];
$autoridad_proyecto = $_POST['autoridad_proyecto'];

$query = "UPDATE proyectos SET nombre_proyecto='$nombre_proyecto', asunto_proyecto='$asunto_proyecto', temas_proyecto='$temas_proyecto', autoridad_proyecto='$autoridad_proyecto' WHERE id='$id'";

if (mysqli_query($conexion, $query)) {
    echo '
        <script>
            alert("Proyecto actualizado exitosamente");
            window.location = "../inicio.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al actualizar proyecto");
            window.location = "../inicio.php";
        </script>
    ';
}

mysqli_close($conexion);
?>
