<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>GADI</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

 <link rel="icon" href="vistas/img/plantilla/favicon.jpg">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2/italic.js">

   <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
 <script src="vistas/plugins/sweetalert2/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<!-- agregar para que inicie mini  sidebar-collapse-->

<body class="hold-transition skin-blue  sidebar-mini login-page">
 
  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

   echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/
    if($_SESSION["iniciarSesion"] == "ok" && $_SESSION["perfil"] == "Administrador"){
    include "modulos/menu.php";
    }else{
      include "modulos/menu2.php";
    }

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])&& $_SESSION["perfil"] == "Administrador"){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "categorias" ||
         $_GET["ruta"] == "categoriasC" ||
         $_GET["ruta"] == "departamentos" ||
         $_GET["ruta"] == "cargos" ||
         $_GET["ruta"] == "personal" ||
         $_GET["ruta"] == "tipos" ||
         $_GET["ruta"] == "tiposC" ||
         $_GET["ruta"] == "marcas" ||
         $_GET["ruta"] == "modelo" ||
         $_GET["ruta"] == "marcasC" ||
         $_GET["ruta"] == "modeloC" ||
         $_GET["ruta"] == "productos" ||
         $_GET["ruta"] == "equipos" ||
         $_GET["ruta"] == "consumibles" ||
         $_GET["ruta"] == "solicitudes" ||
         $_GET["ruta"] == "asignaciones" ||
         $_GET["ruta"] == "asignacionesC" ||
         $_GET["ruta"] == "salir"){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }if(isset($_GET["ruta"])&& $_SESSION["perfil"] == "Usuario"){
      if($_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "usuarios" ||
      $_GET["ruta"] == "equipos" ||
      $_GET["ruta"] == "solicitudes" ||
      $_GET["ruta"] == "salir"){

     include "modulos/".$_GET["ruta"].".php";

   }else{
    echo '<script>alert("no tienes permiso")</script>';
    include "modulos/inicio.php";
   //  include "modulos/404.php";

   }
    }else {

    

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';

  }else{

    include "modulos/login.php";

  }

  ?>


<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/modelos.js"></script>
<script src="vistas/js/tipos.js"></script>
<script src="vistas/js/marcas.js"></script>
<script src="vistas/js/categoriasC.js"></script>
<script src="vistas/js/modelosC.js"></script>
<script src="vistas/js/tiposC.js"></script>
<script src="vistas/js/marcasC.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/equipos.js"></script>
<script src="vistas/js/consumibles.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/cargar.js"></script>
<script src="vistas/js/cargar3.js"></script>
<script src="vistas/js/departamentos.js"></script>
<script src="vistas/js/cargos.js"></script>
<script src="vistas/js/personal.js"></script>
<script src="vistas/js/solicitud.js"></script>
<script src="vistas/js/asignacion.js"></script>
<script src="vistas/js/asignacionC.js"></script>

</body>
</html>
