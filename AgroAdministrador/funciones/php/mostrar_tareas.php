<?php
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

// Consulta SQL para seleccionar todas las tareas de la tabla consejos
$sql = "SELECT ConsejoID, tarea FROM consejos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir cada tarea en un div con clase 'tarea'
    while($row = $result->fetch_assoc()) {
        $consejoID = $row["ConsejoID"];
        $tarea = $row["tarea"];
        echo "<div class='tarea'>" . $tarea . "
                <button class='boton modificar' onclick='location.href=\"php/editar_tarea.php?consejoID=$consejoID\"'>Modificar</button>
                <button class='boton eliminar' onclick='eliminarTarea($consejoID)'>Eliminar</button>
            </div>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>
