<?php
require_once "conexion2.php";

function getListasDes(){

    $conexion = getConn();
    $id = $_POST['id'];
    $query = "select * from personal where cedula =$id";
    $result = $conexion -> query($query);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
     $listas.="<option  value='$row[id]'>$row[nombres]</option>";
    }
    return $listas;
}
echo getListasDes();

?>