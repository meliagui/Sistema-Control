<?php
if (!empty($_POST["btmodificar"])) {
  if (!empty($_POST["txtid"]) and !empty($_POST["txtnombre"]) and !empty($_POST["txtapellidos"]) and !empty($_POST["txtdni"])  and !empty($_POST["txtfecha"]) and !empty($_POST["txtturno"]) 
  and !empty($_POST["txtnivel"]) and !empty($_POST["txtgrado"]) and !empty($_POST["txtseccion"]) and !empty($_POST["txthoraentrada"]) and !empty($_POST["txthorasalida"])) {
    $id=$_POST["txtid"];
    $nombre=$_POST["txtnombre"];
    $apellidos=$_POST["txtapellidos"];
    $dni=$_POST["txtdni"];
    $fecha=$_POST["txtfecha"];
    $turno=$_POST["txtturno"];
    $nivel=$_POST["txtnivel"];
    $grado=$_POST["txtgrado"];
    $seccion=$_POST["txtseccion"];
    $horaentrada=$_POST["txthoraentrada"];
    $horasalida=$_POST["txthorasalida"];
    $sql=$conexion->query("update matricula set nombre='$nombre',apellidos='$apellidos',dni='$dni',fecha_matricula='$fecha',turno='$turno',id_nivel='$nivel',id_grado='$grado', id_seccion='$seccion',hora_entrada=' $horaentrada',hora_salidada=' $horasalida' where id_matricula=$id ");
    if ($sql == true){ ?>
        <script>
      $(function notificacion(){
        new PNotify({
          title:"CORRECTO",
          type:"success",
          text:"La matricula se ha modificado correctamente",
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
          text:"Error al modificar matricula",
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
          text:"Los campos estan vacios",
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