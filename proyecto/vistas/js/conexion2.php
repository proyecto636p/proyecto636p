<?php
function getConn(){
    $conexion=mysqli_connect('localhost','root','','pos');
    if(mysqli_connect_errno($conexion))
    echo"fallo al conectar a myql:" .mysqli_connect_error();
    $conexion->set_charset('utf8');
    return $conexion;
}

?>