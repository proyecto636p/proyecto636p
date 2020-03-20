<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Personal
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Personal</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPersonal">
          
          Agregar Personal

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaPersonal" width="100%">
         
        <thead>
         
         <tr>

           <th>Documento ID</th>
           <th>Nombres</th>
           <th>Apellidos</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Dirección</th>
           <th>Fecha nacimiento</th> 
           <th>Departamento</th>
           <th>Cargo</th>
           <th>Status</th>
           <th>Ingreso al sistema</th>
           <th>Acciones</th>

         </tr> 

        </thead>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PERSONAL
======================================-->

<div id="modalAgregarPersonal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Personal</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

                      <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
                      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar su Cedula" required>

              </div>

            </div>

            <!-- ENTRADA PARA LOS NOMBRES -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg"   name="nombres" placeholder="Ingrese sus Nombres" required>

              </div>

            </div>

                        <!-- ENTRADA PARA LOS APELLIDOS -->
            
                        <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApellidos" placeholder="Ingrese sus Apellidos" required>

              </div>

            </div>



            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>


            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>


             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaNac" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
                          <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion" >
                <option value="">Selecionar Cargo</option>
                  <option value="2">infor</option>
                  <option value="4">rrhh</option>
                </select>

              </div>

            </div>

            
                          <!-- ENTRADA PARA LA MARCA -->

                          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg" id="nuevoCargo" name="nuevoCargo" >
                  
                  <option value="">Selecionar Cargo</option>
                  <option value="2">informatica</option>
                  <option value="4">rrhh</option>
                </select>

              </div>

            </div>

             <!-- ENTRADA PARA EL STATUS -->

               <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg" id="nuevoStatus" name="nuevoStatus" required>
                  <option value="">Estado</option>
                  <option value="activo">activo</option>
                  <option value="inactivo">inactivo</option>

                </select>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar solicitud</button>

        </div>

      </form>

      <?php

        $crearPersonal = new ControladorPersonals();
        $crearPersonal -> ctrCrearPersonal();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PERSONAL
======================================-->

<div id="modalEditarPesonal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar solicitud</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

                     <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
                     <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL NOMBRES -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNombres" id="editarNombres" required>
                <input type="hidden" id="idNombres" name="idNombres">
              </div>

            </div>

 
            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
                         <!-- ENTRADA PARA EL STATUS -->

                         <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg" id="EditarStatus" name="EditarStatus" required>
                  <option value="">Estado</option>
                  <option value="activo">activo</option>
                  <option value="inactivo">inactivo</option>

                </select>

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

        $editarPersonal = new ControladorPesonals();
        $editarPersonal -> ctrEditarPersonal();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarPersonal = new ControladorPersonals();
  $eliminarPersonal -> ctrEliminarPersonal();

?>


