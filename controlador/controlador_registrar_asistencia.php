<?php
if(!empty($_POST["btnentrada"])){
if (!empty($_POST["txtdni"])) {
  $dni=$_POST["txtdni"];
  $consulta=$conexion->query( "select count(*) as 'total' from alumno where dni='$dni' ");
  $id=$conexion->query( "select id_alumno from alumno where dni='$dni' ");
  if ($consulta->fetch_object()-> total > 0) {
       $fecha=date("Y-m-d");
       $hora=date("h:i:s");
       $id_alumno=$id->fetch_object()->id_alumno;
       $sql=$conexion->query("insert into asistencia (id_alumno,fecha, entrada) values ($id_alumno, '$fecha', '$hora') ");
          if ($sql==true) { ?>
          
          <script>
              $(function notificacion(){
                new PNotify({
                title:"CORRECTO",
                  type:"success",
                text:"Se ha registrado su ENTRADA con éxito",
                styling:"bootstrap3"
                })
            })
            </script>
            <?php } else { ?>
            <script>
              $(function notificacion(){
              new PNotify({
                  title:"INCORRECTO",
                  type:"error",
                  text:"Error al registrar ENTRADA",
                  styling:"bootstrap3"
                })
              })
            </script>
                <?php }
            } else { ?>
            <script>
              $(function notificacion(){
                new PNotify({
                  title:"INCORRECTO",
                  type:"error",
                  text:"El DNI ingresado no existe",
                  styling:"bootstrap3"
                })
              })
            </script>
          <?php }
          } else { ?>
            <script>
                $(function notificacion(){
                  new PNotify({
                    title:"INCORRECTO",
                    type:"error",
                    text:"Ingrese el DNI",
                    styling:"bootstrap3"
                  })
                })
              </script>
          <?php } ?>
          <script>
                setTimeout(() => {
                  window.history.replaceState(null,null, window.location.pathname); 
                }, 0);
          </script>

          <?php }

          ?>





<?php
if(!empty($_POST["btnsalida"])){
if (!empty($_POST["txtdni"])) {
  $dni=$_POST["txtdni"];
  $consulta=$conexion->query( "select count(*) as 'total' from alumno where dni='$dni' ");
  $id=$conexion->query( "select id_alumno from alumno where dni='$dni' ");
  if ($consulta->fetch_object()-> total > 0) {
    $hora=date("h:i:s"); 
    $id_alumno=$id->fetch_object()->id_alumno;

   $busqueda=$conexion->query("select id_asistencia from asistencia where id_alumno=$id_alumno order by id_asistencia desc limit 1");
    $id_asistencia=$busqueda->fetch_object()->id_asistencia;
   $sql=$conexion->query("update asistencia set salida='$hora' where id_asistencia=$id_asistencia ");
    if ($sql==true) { ?>
    <script>
      $(function notificacion(){
        new PNotify({
          title:"CORRECTO",
          type:"success",
          text:"Se ha registrado su SALIDA con éxito",
          styling:"bootstrap3"
        })
      })
    </script>
    <?php } else { ?>
    <script>
      $(function notificacion(){
        new PNotify({
          title:"INCORRECTO",
          type:"error",
          text:"Error al registrar SALIDA",
          styling:"bootstrap3"
        })
      })
    </script>
    <?php }

    } else { ?>
    <script>
      $(function notificacion(){
        new PNotify({
          title:"INCORRECTO",
          type:"error",
          text:"El DNI ingresado no existe",
          styling:"bootstrap3"
        })
      })
    </script>
<?php }
 } else { ?>
  <script>
      $(function notificacion(){
        new PNotify({
          title:"INCORRECTO",
          type:"error",
          text:"Ingrese el DNI",
          styling:"bootstrap3"
        })
      })
    </script>
<?php } ?>
<script>
      setTimeout(() => {
         window.history.replaceState(null,null, window.location.pathname); 
      }, 0);
</script>

<?php }

?>


