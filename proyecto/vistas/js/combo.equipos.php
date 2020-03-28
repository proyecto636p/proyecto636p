<?php
require_once "conexion2.php";
function getListasRep(){

    $conexion = getConn();
    $query = "select e.*, t.* from equipos as e inner join tipos as t on e.tipo=t.id ";
    $result = $conexion -> query($query);
    $listas="<option value='0'>Elige un Equipo</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
     $listas.="<option value='$row[codigo]'>$row[codigo] $row[descripcion]</option>";
    }
    return $listas;
}
echo getListasRep();

?>