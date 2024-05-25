<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consejoID']) && isset($_POST['tarea'])) {
    // Conexión a la base de datos
    $servername = "localhost:3315";
    $username = "root";
    $password = "";
    $database = "agroalerta";
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $consejoID = $_POST['consejoID'];
    $consejo = $_POST['consejo'];
    $tarea = $_POST['tarea'];

    $sql = "UPDATE consejos SET consejo='$consejo', tarea='$tarea' WHERE ConsejoID=$consejoID";

    if ($conn->query($sql) === TRUE) {
        echo "Tarea y consejo actualizados exitosamente";
    } else {
        echo "Error al actualizar la tarea y el consejo: " . $conn->error;
    }

    $conn->close();
    header("Location: ../consejos.php");
    exit();
} else {
    echo "Solicitud inválida";
}
