<?php
require_once "conexion2.php";
function getListasRep(){

    $conexion = getConn();
    $query = "select u.*, p.* from personal as p inner join usuarios as u on u.nombre = p.id";
    $result = $conexion -> query($query);
    $listas="<option value=''>Elige un Usuario</option>";

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $listas.="<option value='$row[id]'>$row[cedula] $row[nombres]</option>";
           }
    

    return $listas;
}
echo getListasRep();

?>