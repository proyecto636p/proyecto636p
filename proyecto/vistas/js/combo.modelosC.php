<?php
require_once "conexion2.php";

function getListasDes(){

    $conexion = getConn();
    $id = $_POST['id'];
    $query = "select * from modelosC where idmarcaf =$id";
    $result = $conexion -> query($query);
    $listas="<option value='0'>Elige una Modelo</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
     $listas.="<option value='$row[modelo]'>$row[modelo]</option>";
    }
    return $listas;
}
echo getListasDes();

?>