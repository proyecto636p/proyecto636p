<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      GESTIONAR SOLICITUDES
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Solicitudes Reportadas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">
      
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Codigo</th>
           <th>Usuario</th>
           <th>Departamento</th>
           <th>Tecnico</th>
           <th>Tipo</th>
           <th>Asunto</th>
           <th>Solucon</th>
           <th>Estatus</th>
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

          <?php

if($_SESSION["perfil"]=="Administrador" || $_SESSION["perfil"]=="Tecnico" ){

          $item = null;
          $valor = null;

          $respuesta = ControladorSoporte::ctrMostrarSoporte($item, $valor);

          foreach ($respuesta as $key => $value) {
           

           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["codigo"].'</td>';

                  $itemUsuario = "usuario";
                  $valorUsuario = $value["id_usuario"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  echo '<td class="text-uppercase">'.$respuestaUsuario["usuario"].'</td>';

                  $itemDepart = "id";
                  $valorDepart = $value["sop_departamento"];

                  $respuestaDepart = ControladorDepartamentos::ctrMostrarDepartamentos($itemDepart, $valorDepart);

                  echo '<td class="text-uppercase">'.$respuestaDepart["descripcion"].'</td>';

                  $itemTec = "usuario";
                  $valorTec = $value["id_atiende"];

                  $respuestaTec = ControladorUsuarios::ctrMostrarUsuarios($itemTec, $valorTec);

                  echo '<td class="text-uppercase">'.$respuestaTec["usuario"].'</td>

                  <td>'.$value["tipo_falla"].'</td>

                  <td>'.$value["asunto"].'</td>

                  <td>'.$value["solucion"].'</td>

                  <td class="text-uppercase">'.$value["estatus"].'</td>

                  <td>'.$value["Fecha_soporte"].'</td>

                  <td>

                    <div class="btn-group">
                        

                      <button class="btn btn-info btnGestSoporte" idGest="'.$value["id"].'" data-toggle="modal" data-target="#modalGestSoporte"><i class="fa fa-check-square-o"></i></button>

                      <button class="btn btn-success btnImprimirSolicitud" codigoSolicitud="'.$value["codigo"].'">

                        <i class="fa fa-print"></i>

                      </button>

                    </div>  

                  </td>

                </tr>';
            }
          }else{
            $item = "id_usuario";
            $valor = $_SESSION["usuario"];
  
            $respuesta = ControladorSoporte::ctrMostrarSoporte($item, $valor);
  
            foreach ($respuesta as $key => $value) {
             
  
             echo '<tr>
  
                    <td>'.($key+1).'</td>
  
                    <td>'.$value["codigo"].'</td>';
  
                    $itemUsuario = "usuario";
                    $valorUsuario = $value["id_usuario"];
  
                    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
  
                    echo '<td class="text-uppercase">'.$respuestaUsuario["usuario"].'</td>';
  
                    $itemDepart = "id";
                    $valorDepart = $value["sop_departamento"];
  
                    $respuestaDepart = ControladorDepartamentos::ctrMostrarDepartamentos($itemDepart, $valorDepart);
  
                    echo '<td class="text-uppercase">'.$respuestaDepart["descripcion"].'</td>';
  
                    $itemTec = "usuario";
                    $valorTec = $value["id_atiende"];
  
                    $respuestaTec = ControladorUsuarios::ctrMostrarUsuarios($itemTec, $valorTec);
  
                    echo '<td class="text-uppercase">'.$respuestaTec["usuario"].'</td>
  
                    <td>'.$value["tipo_falla"].'</td>
  
                    <td>'.$value["asunto"].'</td>
  
                    <td>'.$value["solucion"].'</td>
  
                    <td class="text-uppercase">'.$value["estatus"].'</td>
  
                    <td>'.$value["Fecha_soporte"].'</td>
  
                    <td>
  
                      <div class="btn-group">
                          
                        <button class="btn btn-success btnImprimirSolicitud" codigoSolicitud="'.$value["codigo"].'">
  
                          <i class="fa fa-print"></i>
  
                        </button>
  
                      </div>  
  
                    </td>
  
                  </tr>';
              }

          }

        ?>
 
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<div id="modalGestSoporte" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Atender Solicitud</h4>

        </div>


        <div class="modal-body">

          <div class="box-body">


            <div class="form-group">
              <label class="control-label">N°:SOLICITUD</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control" name="gestSoporte" id="gestSoporte" readonly>

              </div>

            </div>


            <div class="form-group">
              <label class="control-label">USUARIO SOLICITANTE</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span> 

                <input type="text" class="form-control" id="idUser" name="idUser" readonly>
            
              </div>

            </div>
            
            <div class="form-group">
              <label class="control-label">DEPARTAMENTO</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                <select class="form-control input-lg"  name="nuevoDepart" readonly>
                  
                  <option id="nuevoDepart"></option>

                </select>

              </div>

            </div>

            <div class="form-group">
              <label class="control-label">TIPO DE FALLA</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-bars"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevaFalla" name="nuevaFalla" readonly>

              </div>

            </div>

            <div class="form-group">

              <label class="control-label">ASUNTO</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-edit"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoAsunto" name="nuevoAsunto" readonly>

              </div>

            </div>

            <div class="form-group">
              <label class="control-label">Tecnico Responsable *</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-vcard"></i></span> 

                <input type="text" class="form-control" id="GestTec" value="<?php echo $_SESSION["usuario"]; ?>" readonly>

                <input type="hidden" name="sopTec" value="<?php echo $_SESSION["usuario"]; ?>">

              </div>

            </div>

            <div class="form-group">
              <label class="control-label">Estatus *</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-retweet"></i></span> 

                <select class="form-control input-lg" name="nuevoEstatus">
                  
                  <option value="" id="nuevoEstatus"></option>

                  <option value="En Proceso">En Proceso</option>

                  <option value="Finalizado">Finalizado</option>

                </select>

              </div>
            </div>

            <div class="form-group">
              
              <div class="form-group label-floating">
              
                 
                <label class="control-label">Posible/Solucion *</label>
                <textarea name="nuevaSolucion" id="nuevaSolucion" class="form-control" rows="2" maxlength="40" required></textarea>

              </div>

            </div>


  
          </div>

        </div>


        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">GESTIONAR</button>

        </div>

        <?php

          $gestSoporte = new ControladorSoporte();
          $gestSoporte -> ctrGestSoporte();

        ?>

      </form>

    </div>

  </div>

</div>