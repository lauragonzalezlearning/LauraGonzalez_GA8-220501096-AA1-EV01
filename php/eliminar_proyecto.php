<?php
include 'conexion_db.php';
session_start();

$id = $_GET['id'];

$query = "DELETE FROM proyectos WHERE id='$id'";

if (mysqli_query($conexion, $query)) {
    echo '
        <script>
            alert("Proyecto eliminado exitosamente");
            window.location = "../inicio.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al eliminar proyecto");
            window.location = "../inicio.php";
        </script>
    ';
}

mysqli_close($conexion);
?>
