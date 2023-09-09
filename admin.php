<?php
session_start();

if (isset($_SESSION['alerta'])) {
    echo '<script>alert("' . $_SESSION['alerta'] . '");</script>';
    unset($_SESSION['alerta']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles/styleadmin.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
    <div class="sesion">
    <div class="card">
        <h1>INICIA SESIÓN</h1>
        <form action="./listar.php" method="POST">
            <label for="">Usuario</label>
            <input type="text" name="usuario" required>
            <label for="">Contraseña</label>
            <input type="password" name="contraseña" required>
            <input type="submit" class="button" value="Entrar">
        </form>
    </div>
    </div>
   
</body>
</html>