<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/categoriasC.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/equipos.controlador.php";
require_once "controladores/consumibles.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/modelos.controlador.php";
require_once "controladores/tipos.controlador.php";
require_once "controladores/marcas.controlador.php";
require_once "controladores/modelosC.controlador.php";
require_once "controladores/tiposC.controlador.php";
require_once "controladores/marcasC.controlador.php";
require_once "controladores/departamentos.controlador.php";
require_once "controladores/cargos.controlador.php";
require_once "controladores/personal.controlador.php";
require_once "controladores/solicitud.controlador.php";
require_once "controladores/asignacion.controlador.php";
require_once "controladores/asignacionC.controlador.php";
require_once "controladores/soporte.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/categoriasC.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/equipos.modelo.php";
require_once "modelos/consumibles.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/modelos.modelo.php";
require_once "modelos/marcas.modelo.php";
require_once "modelos/tipos.modelo.php";
require_once "modelos/modelosC.modelo.php";
require_once "modelos/marcasC.modelo.php";
require_once "modelos/tiposC.modelo.php";
require_once "modelos/departamentos.modelo.php";
require_once "modelos/cargos.modelo.php";
require_once "modelos/personal.modelo.php";
require_once "modelos/solicitud.modelo.php";
require_once "modelos/asignacion.modelo.php";
require_once "modelos/asignacionC.modelo.php";
require_once "modelos/soporte.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();