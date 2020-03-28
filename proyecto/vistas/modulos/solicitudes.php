<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Solicitudes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Solicitudes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSolicitud">
          
          Agregar Solicitud

        </button>

      </div>

      <div class="box-body">
      <?php
         if($_SESSION["perfil"]=="Administrador"){
         echo '       
       <table class="table table-bordered table-striped dt-responsive tablaSolicitud" width="100%">
         
        <thead>
         
         <tr>

           <th>codigo</th>
           <th>solicitud</th>
           <th>usuario</th>
           <th>estado</th>
           <th>fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

       

       </table>';
      }else {
        echo '
        <table class="table table-bordered table-striped dt-responsive tablaSolicitud2" width="100%">
         
        <thead>
         
         <tr>

           <th>codigo</th>
           <th>solicitud</th>
           <th>usuario</th>
           <th>estado</th>
           <th>fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

       

       </table>';
       }
         ?>
      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR SOLICITUD
======================================-->

<div id="modalAgregarSolicitud" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Solicitud</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->


        <div class="modal-body">

          <div class="box-body">

                      <!-- ENTRADA PARA LA SOLICITUD -->
            
                      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaSolicitud" placeholder="Ingresar su Solicitud" required>

              </div>

            </div>

            <!-- entrada para el usuario -->

            <input type="hidden" value='<?php echo $_SESSION['nombre']; ?>' name="nuevoUsuariof">

                        
 
               <!-- ENTRADA PARA el status -->

               <input type="hidden" value="0" name="nuevoEstado">
             

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Solicitud</button>

        </div>

      </form>

        <?php

$crearSolicitud = new ControladorSolicitudes();
$crearSolicitud -> ctrCrearSolicitud();
        ?>  

    </div>

  </div>

</div>
</div>

<!--=====================================
MODAL EDITAR SOLICITUD
======================================-->
<div id="modalEditarSolicitud" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" >


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Solicitud</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">

          <div class="box-body">

                      <!-- ENTRADA PARA EL  solicitud -->
            
                      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarSolicitud" id="editarSolicitud"  required>

              </div>

            </div>

            <!-- entrada para el usuario -->

            <input type="hidden" value='<?php echo $_SESSION['nombre']; ?>' name="editarUsuariof">

                        
 
               <!-- ENTRADA PARA el status -->

               <input type="hidden" id=editarEstado name="editarEstado"> 

               <input type="hidden" id="editarId" name="editarId"> 

        </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>
      <?php
            $editarSolicitud = new ControladorSolicitudes();
             $editarSolicitud -> ctrEditarSolicitud();

      ?>

    </div>

  </div>

</div>

<?php

  $eliminarSolicitud = new ControladorSolicitudes();
  $eliminarSolicitud -> ctrEliminarSolicitud();

?>      



