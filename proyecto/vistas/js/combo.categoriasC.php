<?php
require_once "conexion2.php";
function getListasRep(){

    $conexion = getConn();
    $query = "select * from categoriasc";
    $result = $conexion -> query($query);
    $listas="<option value='0'>Elige una Categoria</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
     $listas.="<option value='$row[id]'>$row[categoria]</option>";
    }
    return $listas;
}
echo getListasRep();

?>