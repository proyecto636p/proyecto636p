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
           

         <th>Cedula</th>
           <th>Nombres</th>
           <th>Apellidos</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Dirección</th>
           <th>Fecha Nacimiento</th> 
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

      <form role="form" method="post" enctype="multipart/form-data">

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
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombres" placeholder="Ingresar sus Nombres" required>

              </div>

            </div>
                        <!-- ENTRADA PARA LOS APELLIDOS -->
            
                        <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApellidos" placeholder="Ingresar sus Apellidos" required>

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

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
                          <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion" >
                </select>

              </div>

            </div>

            
                          <!-- ENTRADA PARA LA MARCA -->

                          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg" id="nuevoCargo" name="nuevoCargo" >

                </select>

              </div>

            </div>

             <!-- ENTRADA PARA EL STATUS -->

               <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg"  name="nuevoStatus" required>
                  <option value="">Estado</option>
                  <option value="activo">activo</option>
                  <option value="inactivo">inactivo</option>

                </select>

              </div>

            </div>    

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Personal</button>

        </div>

      </form>

        <?php

$crearPersonal = new ControladorPersonals();
$crearPersonal -> ctrCrearPersonal();
        ?>  

    </div>

  </div>

</div>
</div>

<!--=====================================
MODAL EDITAR EQUIPO
======================================-->
<div id="modalEditarEquipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" >


        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Equipo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

            <div class="box-body">


                  <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

               <div class="form-group">              
                    <div class="input-group">              
                              <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                        <select class="form-control input-lg"  name="editarCategoria" readonly required>
                             <option id="editarCategoria"></option>
                       </select>                
                   </div>
               </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
                <div class="form-group">              
                   <div class="input-group">              
                         <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                       <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo"  readonly required>
                   </div>
               </div>

                          <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                      <div class="form-group">
                           <div class="input-group">
                                  <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 
                                <select class="form-control input-lg"  name="editarDescripcion" readonly required>               
                                     <option id="editarDescripcion"></option>  
                               </select>
                           </div>
                      </div>

            
                          <!-- ENTRADA PARA LA MARCA -->

                     <div class="form-group">              
                       <div class="input-group">              
                               <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 
                              <select class="form-control input-lg"  name="editarMarca" readonly required>                  
                               <option id="editarMarca"></option>  
                             </select>
                      </div>
                    </div>

                                      <!-- ENTRADA PARA EL MODELO -->

             <div class="form-group">
                 <div class="input-group">
                               <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 
                    <select class="form-control input-lg"  name="editarModelo" readonly required>
                  
                              <option id="editarModelo"></option>
  
                    </select>
              </div>
            </div>

               <!-- ENTRADA PARA LA ASIGNACION -->

                <div class="form-group">
                       <div class="input-group">
                              <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 
                             <select class="form-control input-lg" id="editarAsignado" name="editarAsignado" required>
                               <option value="">Asignacion</option>
                                <option value="no asignado"> no asignado</option>
                               <option value="asignado">asignado</option>
                             </select>
                       </div>
                </div>
                           <!-- ENTRADA PARA EL STATUS -->

                  <div class="form-group">
                         <div class="input-group">
                                    <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 
                             <select class="form-control input-lg" id="editarEstado" name="editarEstado" required>
                                  <option value="">Estado</option>
                                  <option value="activo">activo</option>
                                  <option value="inactivo">inactivo</option>
                             </select>
                         </div>
                   </div>

                         <!-- ENTRADA PARA SERIAL -->

                         <div class="form-group">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                       <input type="text" class="form-control input-lg" id="editarSerial" name="editarSerial"   required>
                                </div>
                          </div>

             <!-- ENTRADA PARA STOCK -->

                 <div class="form-group">             
                     <div class="input-group">              
                           <span class="input-group-addon"><i class="fa fa-check"></i></span>
                           <input type="number" class="form-control input-lg" name="editarStock" min="0" id="editarStock" required>
                    </div>
                </div>

            <!-- ENTRADA PARA LA OBSERVACION -->
                 <div class="form-group">              
                      <div class="input-group">              
                            <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                          <input type="text" class="form-control input-lg" name="editarObservacion"  id="editarObservacion" required>
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
            $editarEquipo = new ControladorEquipos();
             $editarEquipo -> ctrEditarEquipo();

      ?>

    </div>

  </div>

</div>

<?php

  $eliminarEquipo = new ControladorEquipos();
  $eliminarEquipo -> ctrEliminarEquipo();

?>      



