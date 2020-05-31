<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Equipos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Equipos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEquipo">
          
          Agregar Equipo

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaEquipos" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Código</th>
           <th>Serial</th>
           <th>Categoría</th>
           <th>Descripción</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Estado</th>
           <th>Stock</th>
           <th>Asignacion</th>
           <th>Agregado</th>
           <th>Observacion</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>

       

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarEquipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Equipo</h4>

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

                <select class="form-control input-lg" id="nuevaCategoriaE" name="nuevaCategoria" required>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>

              </div>

            </div>

                          <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg" id="nuevaDescripcionE" name="nuevaDescripcion" required>
                <option value="">Selecionar Descripcion</option>
                </select>

              </div>

            </div>

            
                          <!-- ENTRADA PARA LA MARCA -->

                          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg" id="nuevaMarcaE" name="nuevaMarca" required>
                  
                  <option value="">Selecionar Marca</option>
  
                </select>

              </div>

            </div>

                                      <!-- ENTRADA PARA EL MODELO -->

                                      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg" id="nuevaModeloE" name="nuevaModelo" required>
                  
                  <option value="">Selecionar Modelo</option>
  
                </select>

              </div>

            </div>

               <!-- ENTRADA PARA LA ASIGNACION -->


               <input type="hidden" value="no asignado" name="nuevoAsignado">
                           <!-- ENTRADA PARA EL STATUS -->

                           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i  class="fa fa-product-hunt"></i></span> 

                <select class="form-control input-lg" id="nuevoEstado" name="nuevoEstado" required>
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

                <input type="text" class="form-control input-lg" name="nuevoSerial"  placeholder="Serial" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

               

              </div>

            </div> -->

            <input type="hidden" class="form-control input-lg" name="nuevoStock"  value="1">

            <!-- ENTRADA PARA LA OBSERVACION -->
                 <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaObservacion"  placeholder="Observacion" >

              </div>

            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Equipo</button>

        </div>

      </form>

        <?php

          $crearEquipo = new ControladorEquipos();
          $crearEquipo -> ctrCrearEquipo();

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
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                                       <input type="text" class="form-control input-lg" id="editarAsignado" name="editarAsignado"  readonly required>
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

             <!-- ENTRADA PARA STOCK 

                 <div class="form-group">             
                     <div class="input-group">              
                           <span class="input-group-addon"><i class="fa fa-check"></i></span>
                           
                    </div>
                </div>-->

                <input type="hidden" class="form-control input-lg" name="editarStock"  id="editarStock" >

            <!-- ENTRADA PARA LA OBSERVACION -->
                 <div class="form-group">              
                      <div class="input-group">              
                            <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                          <input type="text" class="form-control input-lg" name="editarObservacion"  id="editarObservacion" >
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



