<?php

require_once "../../../controladores/soporte.controlador.php";
require_once "../../../modelos/soporte.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/personal.controlador.php";
require_once "../../../modelos/personal.modelo.php";

require_once "../../../controladores/departamentos.controlador.php";
require_once "../../../modelos/departamentos.modelo.php";

class imprimirSolicitud{

public $codigo;

public function traerImpreSolicitud(){


$itemSolicitud = "codigo";
$valorSolicitud = $this->codigo;

$respuestaSolicitud = ControladorSoporte::ctrMostrarSoporte($itemSolicitud, $valorSolicitud);

$itemUser = "cedula";
$valorUser = $respuestaSolicitud["id_usuario"];

$respuestaUsuario = ControladorPersonals::ctrMostrarPersonals($itemUser, $valorUser);


//$itemUser2 = "cedula";
//$valorUser2 = $respuestaSolicitud["id_atiende"];

//$respuestaUsuario2 = ControladorPersonals::ctrMostrarPersonals($itemUser2, $valorUser2);

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
			
			<td style=" line-height:80px; text-align:center;">SOLICITUD DE SOPORTE</td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px;">

				Usuario Solicitante: $respuestaUsuario[nombres] $respuestaUsuario[apellidos] <br>
				Cedula: $respuestaUsuario[cedula]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right; font-size:10px; color:blue">
			
				N° - SOLICITUD: $valorSolicitud

			</td>

		</tr>

		<tr>

			<td style="width:390px;"><img src="images/back.jpg"></td>
			
			<td style="border: 1px solid #666; text-align:center; width:150px; color:#339537;">Estatus:<br>$respuestaSolicitud[estatus]</td>
		
		</tr>

		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Departamento: $respuestaDepart[descripcion]

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Tipo de Falla: $respuestaSolicitud[tipo_falla]

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Asunto: $respuestaSolicitud[asunto]

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Solucion: $respuestaSolicitud[solucion]

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				Tecnico Responsable: $respuestaUsuario2[nombres] $respuestaUsuario2[apellidos]

			</td>
		</tr>

		<tr>
			<td style="border: 1px solid #666; background-color:white; width:540px">

				FECHA: $respuestaSolicitud[Fecha_soporte]

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
		
		<td style="width:270px; text-align:center">Firma del Tecnico Responsable <br>$respuestaUsuario2[nombres]<br>Cedula: $respuestaUsuario2[cedula]</td>
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
$solicitud -> codigo = $_GET["codigo"];
$solicitud -> traerImpreSolicitud();


 ?>