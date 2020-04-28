//GESTIONAR SOPORTE//





  $(".tablas").on("click", ".btnGestSoporte", function(){

  var idGest = $(this).attr("idGest");

  var datos = new FormData();
  datos.append("idGest", idGest);

  $.ajax({
      url: "ajax/soporte.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){

          var idDepartamento = new FormData();
          idDepartamento.append("idDepartamento",respuesta["sop_departamento"]);
          
            $.ajax({

              url:"ajax/departamentos.ajax.php",
              method: "POST",
              data: idDepartamento,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){

                $("#nuevoDepart").val(respuesta["id"]);
                $("#nuevoDepart").html(respuesta["descripcion"]);
              }
            })

            var datosUser = new FormData();
            datosUser.append("idUsuario",respuesta["id_usuario"]);
          
            $.ajax({

              url:"ajax/usuarios2.ajax.php",
              method: "POST",
              data: datosUser,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){

                $("#idUser").val(respuesta["usuario"]);
                $("#idUser").html(respuesta["usuario"]);
              }
            })

              $("#sopTec").val(respuesta["id_atiende"]);

              $("#nuevaFalla").val(respuesta["tipo_falla"]);

              $("#nuevoEstatus").html(respuesta["estatus"]);

              $("#nuevoAsunto").val(respuesta["asunto"]);

              $("#nuevaSolucion").val(respuesta["solucion"]);

              $("#gestSoporte").val(respuesta["codigo"]);
            
              }

          })

      })

$(".tablas").on("click", ".btnImprimirSolicitud", function(){

  var codigoSolicitud = $(this).attr("codigoSolicitud");

  window.open("extensiones/tcpdf/pdf/reporte_solicitud.php?codigo="+codigoSolicitud, "_blank");

})


