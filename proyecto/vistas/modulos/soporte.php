<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      BIENVENIDOS
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> INICIO</a></li>
      
      <li class="active">SOLICITUD</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

    <div class="container">  
      <div class="col-lg-5 col-xs-12 bg-info" style="box-shadow: 5px 5px 15px 10px; border-radius:10px 10px 10px 10px;">
        
        <div class="box box-success">
          
          <div class="box-header with-border bg-primary"></div>

            <form role="form" method="post">
        
        <div class="box-body bg-info">
          <h2>Solicitar Soporte</h2>
          <div class="box">
            
            <div class="form-group">
              <label class="control-label">Usuario*</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <?php  $tabla = "personal";

$item = "id";
$valor = $_SESSION["nombre"];

$respuesta1 = ModeloPersonal::MdlMostrarPersonals($tabla, $item, $valor);
?>

                <input type="text" class="form-control" id="nuevoUser" value="<?php echo $respuesta1["cedula"]; ?>" readonly>

                <input type="hidden" name="idUser" value="<?php echo $respuesta1["cedula"]; ?>">

              </div>

            </div>

            <div class="form-group">
              <div class="input-group"> 

              <span class="input-group-addon" style="font-family: monospace;"><i class="fa fa-ravelry"> |</i><b> Su Numero de solicitud es:</b></span>                            

                <?php

                    $item = null;
                    $valor = null;

                    $soporte = ControladorSoporte::ctrMostrarSoporte($item, $valor);

                    if(!$soporte){

                      echo '<input type="text" class="form-control text-center" id="nuevoCodigo" name="nuevoCodigo" value="1001" readonly>';
                  

                    }else{

                      foreach ($soporte as $key => $value) {
                         
                      
                      }

                      $codigo = $value["codigo"] + 1;

                      echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="'.$codigo.'" readonly>';
                    }

                ?>

              </div>

            </div>
            

            <div class="form-group">
              <label class="control-label">Departamento *</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span> 

                <select class="form-control input-lg" id="nuevoDepart" name="nuevoDepart" required>
                  
                  <option value="">Departamento</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $departamento = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

                  foreach ($departamento as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                  }

                  ?>

                </select>

              </div>

            </div>
            
            <input type="hidden" name="sopTec" value="">

            <input type="hidden" name="nuevaSolucion" value="en busca">  

            <input type="hidden" name="nuevoEstatus" value="Pendiente(ACTUAL)">

            <div class="form-group">
              <label class="control-label">Tipo *</label>
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-cogs"></i></span> 

                <select class="form-control input-lg" name="nuevaFalla" required>
                  
                  <option value="">Tipo de Falla</option>

                  <option value="Internet">Falla de Internet</option>

                  <option value="Configuracion">Falla de Configuracion</option>

                  <option value="Equipo">Falla de Equipo</option>

                </select>

              </div>

            </div>

            <div class="form-group">
              
              <div class="form-group label-floating">
              
                 
                <label class="control-label">Asunto *</label>
                <textarea name="nuevoAsunto" class="form-control" rows="2" maxlength="50" placeholder="DESCRIBA LA FALLA" required></textarea>

              </div>

            </div>

            
  
          </div>
          <br>
          <div class="text-center"><button type="submit" class="btn btn-primary">Enviar</button></div>

          <br>
        </div>

        <?php 

          $crearSoporte = new ControladorSoporte();
          $crearSoporte -> ctrCrearSoporte();

        ?>

      </form>


        </div>
            
      </div>

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-success">

          <div class="box-header with-border bg-primary"></div>

          <div class="box-body">
            
              <h1 class="text-center bg-info" style="font-family: serif; border-radius:10px 10px 10px 10px;">AVISO IMPORTANTE</h1>
              <br>
              <p style="font-family: serif;"><b>*.- POR FAVOR GUARDE SU NUMERO DE SOLICITUD YA QUE ESTE LO PODRA USAR PARA CONSULTAR SU ESTADO.</b></p>

              <p style="font-family: serif;"><b>*.- COMPLETE EL FORMULARIO Y ENVIELO, DE ESTA MANERA LO PODREMOS ATENDER LO ANTES POSIBLE.</b></p>

          </div>

        </div>


      </div>

      </div>

    </div>
   
  </section>

</div>
