<?php
// Establecer la conexión con la base de datos
$servername = "localhost:3315";
$username = "root";
$password = "";
$database = "agroalerta";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE Correo = '$correo' AND Contrasena = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['UsuarioID'] = $row['UsuarioID'];
    $_SESSION['Nombre'] = $row['Nombre'];
    $_SESSION['Correo'] = $row['Correo'];
    $_SESSION['TipoUsuario'] = $row['TipoUsuario'];
    
    header("Location: inicio.php"); // Redirigir al dashboard o a la página principal
} else {
    // Credenciales incorrectas
    echo "Correo electrónico o contraseña incorrectos.";
}

$conn->close();
?>
