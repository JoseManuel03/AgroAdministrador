<?php
 session_start();

 if (!isset($_SESSION['UsuarioID'])) {
    header("Location: login.php"); // Redirigir al formulario de inicio de sesión si no ha iniciado sesión
    exit();

    echo "¡Bienvenido, " . $_SESSION['Nombre'] . "! Esta es tu página de inicio.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost:3315"; // Nombre del servidor MySQL
    $username = "root"; // Nombre de usuario MySQL
    $password = ""; // Contraseña de usuario MySQL
    $database = "agroalerta"; // Nombre de la base de datos

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ConsejoID de la tarea a eliminar
    $consejoID = $_POST['consejoID'];

    // Consulta SQL para eliminar la tarea
    $sql = "DELETE FROM consejos WHERE ConsejoID=$consejoID";

    if ($conn->query($sql) === TRUE) {
        echo "Tarea eliminada exitosamente";
    } else {
        echo "Error al eliminar la tarea: " . $conn->error;
    }

    $conn->close();
}
?>
