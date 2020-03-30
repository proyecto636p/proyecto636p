<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Asignaciones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Asignaciones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAsignacion">
          
          Agregar Asignacion

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaAsignacionC" width="100%">
         
        <thead>
         
         <tr>
           

           <th>codigo</th>
           <th>Equipo</th>
           <th>Usuario</th>
           <th>Asignado Por</th>
           <th>Observacion</th>
           <th>fecha</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>

       

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR ASIGNACION
======================================-->

<div id="modalAgregarAsignacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Asignacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->


        <div class="modal-body">

          <div class="box-body">

                      <!-- ENTRADA PARA LA asignacion -->
            

                      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaAsignacionC" name="nuevaAsignacion" required>
  
                </select>

              </div>

            </div>

                                  <!-- ENTRADA PARA EL USUARIO -->
            

                                  <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoUsuario" name="nuevoUsuario" required>
  
                </select>

              </div>

            </div>

            <!-- entrada para el usuario -->

            <input type="hidden" value='<?php echo $_SESSION['nombre']; ?>' name="nuevoAsignadoPor">

            <input type="hidden" value='asignado' name="asignado">
            <input type="hidden" value="1" name="tipo">
                        
                      <!-- ENTRADA PARA EL  solicitud -->
            
                      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaObservacion" id="nuevaObservacion" placeholder="ingrese una observacion">

              </div>

            </div>
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

$crearAsignacion = new ControladorAsignacionesC();
$crearAsignacion -> ctrCrearAsignacion();
        ?>  

    </div>

  </div>

</div>
</div>

<!--=====================================
MODAL EDITAR SOLICITUD
======================================-->
<div id="modalEditarAsignacion" class="modal fade" role="dialog">
  
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

                                <!-- ENTRADA PARA EL  ASIGNACION -->
            
                                <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="EQUIPO" id="EQUIPO" readonly>

              </div>
              </div>

                                    <!-- ENTRADA PARA EL  USUARIO -->
            
                                    <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="USUARIO" id="USUARIO" readonly>

              </div>
              </div>
                                                  <!-- ENTRADA PARA EL  OBSERVACION -->
            
                                                  <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="OBSER" id="OBSER" readonly>

              </div>
              </div>

                       <!-- ENTRADA PARA LA asignacion -->
            

                       <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarAsignacion" name="editarAsignacion" required>
  
                </select>

              </div>

            </div>

                                  <!-- ENTRADA PARA EL USUARIO -->
            

                                  <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarUsuario" name="editarUsuario" required>
  
                </select>

              </div>

            </div>

            <!-- entrada para el usuario -->

            <input type="hidden" value='<?php echo $_SESSION['nombre']; ?>' name="editarAsignadoPor">

            <input type="hidden" id="editarId"  name="editarId">
                        
                      <!-- ENTRADA PARA EL  solicitud -->
            
               <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarObservacion" id="editarObservacion" placeholder="ingrese la observacion">

              </div>
              </div>
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
            $editarAsignacion = new ControladorAsignacionesC();
             $editarAsignacion -> ctrEditarAsignacion();

      ?>

    </div>

  </div>

</div>

<?php

  $eliminarAsignacion = new ControladorAsignacionesC();
  $eliminarAsignacion -> ctrEliminarAsignacion();

?>      



