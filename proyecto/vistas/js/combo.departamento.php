<?php
require_once "conexion2.php";
function getListasRep(){

    $conexion = getConn();
    $query = "select * from departamento";
    $result = $conexion -> query($query);
    $listas="<option value='0'>Elige un Departamento</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
     $listas.="<option value='$row[id]'>$row[descripcion]</option>";
    }
    return $listas;
}
echo getListasRep();

?>