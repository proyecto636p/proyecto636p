<?php
require_once "conexion2.php";

function getListasDes(){

    $conexion = getConn();
    $id = $_POST['id'];
    $query = "select * from marcas where idtipof =$id";
    $result = $conexion -> query($query);
    $listas="<option value='0'>Elige una Marca</option>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
     $listas.="<option value='$row[id]'>$row[descripcion]</option>";
    }
    return $listas;
}
echo getListasDes();

?>