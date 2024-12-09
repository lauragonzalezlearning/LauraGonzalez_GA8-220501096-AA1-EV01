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
$usuario = $_SESSION['usuario'];
$usuario_id_result = mysqli_query($conexion, "SELECT id FROM usuarios WHERE email='$usuario'");
$usuario_id = mysqli_fetch_assoc($usuario_id_result)['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_inicio.css">
    <title>Panel de Proyectos</title>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a la Gestión de sus Proyectos Normativos</h1>
        <a href="php/cerrar_sesion.php">Cerrar Sesión</a>
        
        <!-- Formulario para Crear Proyectos -->
        <div class="form">
            <h2>Crear Proyecto</h2>
            <form action="php/crear_proyecto.php" method="POST">
                <input type="text" name="nombre_proyecto" placeholder="Nombre" required>
                <input type="text" name="asunto_proyecto" placeholder="Asunto" required>
                <input type="text" name="temas_proyecto" placeholder="Temas" required>
                <input type="text" name="autoridad_proyecto" placeholder="Autoridad" required>
                <input type="submit" value="Crear Proyecto">
            </form>
        </div>

        <!-- Mostrar Proyectos -->
        <div class="projects-table-container">
            <h2>Proyectos Registrados</h2>
            <table class="projects-table">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Asunto</th>
                    <th>Temas</th>
                    <th>Autoridad</th>
                    <th>Acciones</th>
                </tr>
                <?php
                $result = mysqli_query($conexion, "SELECT * FROM proyectos WHERE usuario_id = '$usuario_id'");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre_proyecto'] . "</td>";
                    echo "<td>" . $row['asunto_proyecto'] . "</td>";
                    echo "<td>" . $row['temas_proyecto'] . "</td>";
                    echo "<td>" . $row['autoridad_proyecto'] . "</td>";
                    echo "<td><a href='editar_proyecto.php?id=" . $row['id'] . "' class='btn-edit'>Editar</a> 
                              <a href='php/eliminar_proyecto.php?id=" . $row['id'] . "' class='btn-delete'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
