<?php
require_once "conexion2.php";

function getListasDes(){

    $conexion = getConn();
    $id = $_POST['id'];
    $query = "select * from tiposC where idcategoriaf =$id";
    $result = $conexion -> query($query);
    $listas="<option value='0'>Elige una Descripcion</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
     $listas.="<option value='$row[id]'>$row[descripcion]</option>";
    }
    return $listas;
}
echo getListasDes();

?>