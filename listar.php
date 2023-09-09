<?php
session_start();
include("./db/connection.php");

$con = connect();

$sql = "SELECT * FROM asistencia";
$query = mysqli_query($con, $sql);

$usu = 'Juma';
$pass = '1889';

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

if(!$usuario ){
    $_SESSION['alerta'] = 'Debe iniciar sesión';
    header('Location: ./admin.php');
    exit;
}

if ($usuario != $usu || $contraseña != $pass) {
    $_SESSION['alerta'] = 'Credenciales incorrectas';
    header('Location: ./admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ASISTENCIA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./styles/stylelistar.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#listar').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ]
            });
        });
    </script>
</head>

<body> 
<h1 align="center">LISTA DE INVITADOS</h1>
            <div class="listar">
          
                <table id="listar" class="table table-light table-striped table-bordered shadow-lg mt-4" >
                    <thead>
                        <tr align="center">
                            <th>Nombre</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Asiste</th>
                        </tr>
                    </thead>

                    <tbody align="center">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th><?php echo $row['nombre'] ?></th>
                                <th><?php echo $row['celular'] ?></th>
                                <th><?php echo $row['email'] ?></th>
                                <th><?php echo $row['asiste'] ?></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        </div>

</body>

</html>