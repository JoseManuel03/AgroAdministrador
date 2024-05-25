<?php
    
    session_start();

    if (!isset($_SESSION['UsuarioID'])) {
       header("Location: login.php"); // Redirigir al formulario de inicio de sesión si no ha iniciado sesión
       exit();
   
       echo "¡Bienvenido, " . $_SESSION['Nombre'] . "! Esta es tu página de inicio.";
   
   }

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['consejoID'])) {
    // Conexión a la base de datos
    $servername = "localhost:3315";
    $username = "root";
    $password = "";
    $database = "agroalerta";
    $conn = new mysqli($servername, $username, $password, $database);
    
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
    
        $consejoID = $_GET['consejoID'];
        $sql = "SELECT consejo, tarea FROM consejos WHERE ConsejoID=$consejoID";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $consejo = $row['consejo'];
            $tarea = $row['tarea'];
        } else {
            echo "No se encontró la tarea";
            exit();
        }
        $conn->close();
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consejoID']) && isset($_POST['consejo']) && isset($_POST['tarea'])) {
        header("Location: actualizar_tarea.php");
        exit();
    } else {
        echo "Solicitud inválida";
        exit();
    }
    ?>
    
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .edit-page {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .edit-page .edit-box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 700px;
            height: 500px;
            box-sizing: border-box;
        }
        .edit-page .edit-box h1 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
            color: #333;
        }
        .edit-page .edit-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .edit-page .edit-box textarea, 
        .edit-page .edit-box input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .edit-page .button-container {
            display: flex;
            justify-content: space-between;
        }
        .edit-page .edit-box button {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .edit-page .btn-actualizar {
            background-color: #007bff;
        }
        .edit-page .btn-actualizar:hover {
            background-color: #0056b3;
        }
        .edit-page .btn-cancelar {
            background-color: #6c757d;
        }
        .edit-page .btn-cancelar:hover {
            background-color: #5a6268;
        }
    </style>
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
                    <a id="inbox" href="../../inicio.php">
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
                    <a id="inbox" href="../../cerrar_sesion.php">
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
    <div class="edit-page">
        <div class="edit-box">
            <h1>Editar Tarea y Consejo</h1>
            <form method="post" action="actualizar_tarea.php">
                <input type="hidden" name="consejoID" value="<?php echo $consejoID; ?>">
                <label for="tarea">Tarea:</label>
                <input type="text" id="tarea" name="tarea" value="<?php echo htmlspecialchars($tarea);?>">
                <label for="consejo">Consejo:</label>
                <textarea id="consejo" name="consejo" style="height: 250px;"><?php echo htmlspecialchars($consejo); ?></textarea>
                <div class="button-container">
                    <button type="submit" class="btn-actualizar">Actualizar</button>
                    <button type="button" class="btn-cancelar" onclick="window.location.href='../consejos.php'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    </main>
</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../../js/script.js"></script>

</html>
    