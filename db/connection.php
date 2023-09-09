<?php
function connect(){
    $host="localhost";
    $user="u168109197_fegus";
    $pass="";

    $bd="u168109197_boda";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>
