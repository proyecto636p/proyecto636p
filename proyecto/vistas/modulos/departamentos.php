<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar departamentos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar departamentos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDepartamento">
          
          Agregar departamento

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Departamento</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

          foreach ($departamentos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["descripcion"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarDepartamento" idDepartamento="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarDepartamento"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarDepartamento" idDepartamento="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR DEPARTAMENTO
======================================-->

<div id="modalAgregarDepartamento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar departamento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL DEPARTAMENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDepartamento" placeholder="Ingresar departamento" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar departamento</button>

        </div>

        <?php

          $crearDepartamento = new ControladorDepartamentos();
          $crearDepartamento -> ctrCrearDepartamento();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR DEPARTAMENTO
======================================-->

<div id="modalEditarDepartamento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar departamento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL DEPARTAMENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDepartamento" id="editarDepartamento" required>

                 <input type="hidden"  name="idDepartamento" id="idDepartamento" required>

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

      <?php

          $editarDepartamento = new ControladorDepartamentos();
          $editarDepartamento -> ctrEditarDepartamento();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarDepartamento = new ControladorDepartamentos();
  $borrarDepartamento -> ctrBorrarDepartamento();

?>


