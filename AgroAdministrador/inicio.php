<?php 
 $servername = "localhost:3315";
 $username = "root";
 $password = "";
 $dbname = "agroalerta";

 $conn = new mysqli($servername, $username, $password, $dbname);

 session_start();

 if (!isset($_SESSION['UsuarioID'])) {
    header("Location: login.php"); // Redirigir al formulario de inicio de sesión si no ha iniciado sesión
    exit();

    echo "¡Bienvenido, " . $_SESSION['Nombre'] . "! Esta es tu página de inicio.";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroAdministrador</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <ion-icon id="cloud" name="menu-outline"></ion-icon>
                <span>AgroAlerta</span>
            </div>
            
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inbox" href="inicio.php">
                        <ion-icon name="home-outline"></ion-icon>
                        <span>Inicio</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a id="inbox" href="funciones/consejos.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Consejos de cultivo</span>
                    </a>
                </li>
            </ul>
            <ul>
            <ul>
                <li>
                    <a id="inbox" href="modificarInfo.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Plagas</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a id="inbox" href="modificarInfo.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Enfermedades</span>
                    </a>
                </li>
            </ul>
            <ul>
            <ul>
                <li>
                    <a id="inbox" href="cerrar_sesion.php">
                        <ion-icon name="log-out-outline"></ion-icon>
                        <span>Cerrar Sesion</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">
                            
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="usuario">
                <div class="info-usuario">
                    <div class="nombre-email">
                    <span class="nombre"><?php echo $_SESSION['Nombre']; ?></span><br>
                    <span class="email"><?php echo $_SESSION['Correo']; ?></span>
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </div>

    </div>


    <main>

    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>
</body>
</html>