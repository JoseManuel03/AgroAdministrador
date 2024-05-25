<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .options {
            text-align: center;
            margin-top: 10px;
        }

        .options a {
            text-decoration: none;
            color: #007bff;
            margin-right: 15px;
        }

        .options a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form action="login_process.php" method="POST">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <button type="submit">Iniciar sesión</button>

        <div class="options">
            <a href="olvidar_contrasena.php">¿Olvidaste tu contraseña?</a>
        </div>
    </form>
    
</body>
</html>
