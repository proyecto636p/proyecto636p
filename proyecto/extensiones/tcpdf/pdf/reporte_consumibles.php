<?php

require_once "../../../controladores/consumibles.controlador.php";
require_once "../../../modelos/consumibles.modelo.php";

require_once "../../../controladores/categoriasC.controlador.php";
require_once "../../../modelos/categoriasC.modelo.php";

require_once "../../../controladores/tiposC.controlador.php";
require_once "../../../modelos/tiposC.modelo.php";

require_once "../../../controladores/marcasC.controlador.php";
require_once "../../../modelos/marcasC.modelo.php";

require_once "../../../controladores/modelosC.controlador.php";
require_once "../../../modelos/modelosC.modelo.php";

class imprimirSolicitud{


public function traerImpreSolicitud(){


$itemSolicitud = null;
$valorSolicitud = null;

$respuestaSolicitud = ControladorConsumibles::ctrMostrarConsumibles($itemSolicitud, $valorSolicitud);

$itemUser = "cedula";
$valorUser = $respuestaSolicitud["id_usuario"];

$respuestaUsuario = ControladorPersonals::ctrMostrarPersonals($itemUser, $valorUser);

$tabla = "personal";

$itemUser2 = "cedula";
$valorUser2 = $respuestaSolicitud["id_atiende"];

$respuestaUsuario2 = ModeloPersonal::MdlMostrarPersonals($tabla, $itemUser2, $valorUser2);


$itemDepart = "id";
$valorDepart = $respuestaSolicitud["sop_departamento"];

$respuestaDepart = ControladorDepartamentos::ctrMostrarDepartamentos($itemDepart, $valorDepart);



require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$pdf->SetFont('helveticaBI','',12);

$bloque1 = <<<EOF

	<table>
		
		<tr>
			<td><img src="images/pdf-inces.png"></td>
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

//------------------------------------------//

$bloque2 = <<<EOF

	<table>
		

		<tr>
			
			<td style=" line-height:80px; text-align:center;">Datos De Equipos</td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px;">

				Usuario Solicitante:  <br>
				Cedula: 

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right; font-size:10px; color:blue">
			
				N° - SOLICITUD: 

			</td>

		</tr>

		<tr>

			<td style="width:390px;"><img src="images/back.jpg"></td>
			
			<td style="border: 1px solid #666; text-align:center; width:150px; color:#339537;">Estatus:<br></td>
		
		</tr>

		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Departamento: 

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Tipo de Falla:

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Asunto: 

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Solucion: 

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Tecnico Responsable: 

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				FECHA: 

			</td>
		</tr>

		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

		<tr>
			
			<td style="width:540px"></td>
		
		</tr>

	

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

//----------------------------------------------------------//

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="width:270px; text-align:center">______________________________</td>
		<td style="width:270px; text-align:center">______________________________</td>

		</tr>

		<tr>
		
		<td style="width:270px; text-align:center">Firma del Tecnico Responsable <br><br>Cedula:</td>
		<td style="width:270px; text-align:center">Firma del Jefe de División Informática <br> Gustavo Rios <br> Según orden Administrativa N.o OA-2019-08-260 <br> DE FECHA 23-08-2019</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

$pdf->Output('solicitud.pdf');

}

}

$solicitud = new imprimirSolicitud();
$solicitud -> traerImpreSolicitud();


 ?>