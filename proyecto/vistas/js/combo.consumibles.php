<?php
require_once "conexion2.php";
function getListasRep(){

    $conexion = getConn();
    $query = "select e.*, t.* from consumibles as e inner join tiposC as t on e.tipo=t.id where e.asignacion ='no asignado' ";
    $result = $conexion -> query($query);
    $listas="<option value=''>Elige un Consumible</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
     $listas.="<option value='$row[codigo]'>$row[codigo] $row[descripcion]</option>";
    }
    return $listas;
}
echo getListasRep();

?>