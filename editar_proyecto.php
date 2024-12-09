<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("Por favor iniciar sesión");
            window.location = "index.php";
        </script>
    ';
    session_destroy();
    die();
}

include 'PHP/conexion_db.php';
$id = $_GET['id'];
$result = mysqli_query($conexion, "SELECT * FROM proyectos WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_inicio.css">
    <title>Editar Proyecto</title>
</head>
<body>
    <div class="container">
        <h1>Editar Proyecto</h1>
        <form action="php/editar_proyecto_db.php" method="POST" class="form">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="nombre_proyecto" value="<?php echo $row['nombre_proyecto']; ?>" required>
            <input type="text" name="asunto_proyecto" value="<?php echo $row['asunto_proyecto']; ?>" required>
            <input type="text" name="temas_proyecto" value="<?php echo $row['temas_proyecto']; ?>" required> 
            <input type="text" name="autoridad_proyecto" value="<?php echo $row['autoridad_proyecto']; ?>" required>
            <input type="submit" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>
