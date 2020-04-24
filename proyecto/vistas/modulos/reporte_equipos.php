<?php 
  require_once('../../modelos/conexion.php');

  
require_once "../../controladores/equipos.controlador.php";
require_once "../../modelos/equipos.modelo.php";

require_once "../../controladores/categorias.controlador.php";
require_once "../../modelos/categorias.modelo.php";

require_once "../../controladores/tipos.controlador.php";
require_once "../../modelos/tipos.modelo.php";

require_once "../../controladores/marcas.controlador.php";
require_once "../../modelos/marcas.modelo.php";

require_once "../../controladores/modelos.controlador.php";
require_once "../../modelos/modelos.modelo.php";
  class pdf{
  public function cargarEquipos(){
  	$rows=null;
  	$modelo = new Conexion();
  	$conexion=$modelo->conectar();
  	$sql="select * from equipos";
  	$statement=$conexion->prepare($sql);
  	$statement->execute();
  	while ($result=$statement->fetch()) {
  		
  		$rows[]=$result;
  	}

  	return $rows;
  }
	

}
	require_once('pdf/tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'LETTER', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Cesar Ratia');
	$pdf->SetTitle('Datos de Equipos');
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(5, 5, 5, false); 
	$pdf->SetAutoPageBreak(true, 20); 
  $pdf->SetFont('Helvetica', '', 10);
  //$img = file_get_contents('alcaldia.jpg');
  //$pdf->Image('@' . $img);
  $pdf->addPage('L');
  $consultar= new pdf();
  $filas = $consultar->cargarEquipos();
 
  
  if (isset($filas)) {
   


	$content = '';

  $content .= '<header></header>
    <div class="row">
          <div class="col-md-12">
              <h1 style="text-align:center;">Datos de Equipos</h1>
        
      <table border="1" cellpadding="1" bgcolor=""  style="text-align:center;">
        <thead >
          <tr bgcolor="#23ffff" >
           
            <th HEIGHT="20"><B>CODIGO</B></th>
            <th HEIGHT="20"><B>SERIAL</B></th>
            <th HEIGHT="20"><B>CATEGORIA</B></th>
            <th HEIGHT="20"><B>TIPO</B></th>
            <th HEIGHT="20"><B>MARCA</B></th>
            <th HEIGHT="20"><B>MODELO</B></th>
            <th HEIGHT="20"><B>ESTADO</B></th>
            <th HEIGHT="20" WIDTH="50"><B>STOCK</B></th>
            <th HEIGHT="20" WIDTH="80"><B>ASIGNACION</B></th>
            <th HEIGHT="20"><B>AGREGADO</B></th>
            <th HEIGHT="20" WIDTH="90"><B>OBSERVACION</B></th>

          </tr>
        </thead>
  ';

  $item = null;
  $valor = null;

  $equipos = ControladorEquipos::ctrMostrarEquipos($item, $valor);	

  for($i = 0; $i < count($equipos); $i++){


    /*=============================================
    TRAEMOS LA CATEGORÍA
    =============================================*/ 

    $item = "id";
    $valor = $equipos[$i]["categoria"];

    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
    
    /*=============================================
    TRAEMOS EL TIPO
    =============================================*/ 

    $item = "id";
    $valor = $equipos[$i]["tipo"];

    $tipos = ControladorTipos::ctrMostrarTipos($item, $valor);


  /*=============================================
    TRAEMOS EL MARCA
    =============================================*/ 

    $item = "id";
    $valor = $equipos[$i]["marca"];

    $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

    /*=============================================
    STOCK
    =============================================*/ 

    if($equipos[$i]["stock"] <= 10){

      $stock = "<button class='btn btn-danger'>".$equipos[$i]["stock"]."</button>";

    }else if($equipos[$i]["stock"] > 11 && $equipos[$i]["stock"] <= 15){

      $stock = "<button class='btn btn-warning'>".$equipos[$i]["stock"]."</button>";

    }else{

      $stock = "<button class='btn btn-success'>".$equipos[$i]["stock"]."</button>";
    }
  
      $content .= '
      <tr bgcolor="">
             
              <td>'.$equipos[$i]["codigo"].'</td>
              <td>'.$equipos[$i]["seriales"].'</td>
              <td>'.$categorias["categoria"].'</td>
              <td>'.$tipos["descripcion"].'</td>
              <td>'.$marcas["descripcion"].'</td>
              <td>'.$equipos[$i]["modelo"].'</td>
              <td>'.$equipos[$i]["estado"].'</td>
              <td WIDTH="50">'.$stock.'</td>
              <td WIDTH="80">'.$equipos[$i]["asignacion"].'</td>
              <td>'.$equipos[$i]["fecha"].'</td>
              <td WIDTH="90">'.$equipos[$i]["observacion"].'</td>
          </tr>
  
            
    ';

   

 }



 $content .= '</table>';
  
  

  
 
  

	
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?>
		 