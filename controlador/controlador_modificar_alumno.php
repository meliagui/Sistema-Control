<?php
if (!empty($_POST["btmodificar"])) {
  if (!empty($_POST["txtid"]) and !empty($_POST["txtnombre"]) and !empty($_POST["txtapellidos"]) and !empty($_POST["txtdni"])) {
    $id=$_POST["txtid"];
    $nombre=$_POST["txtnombre"];
    $apellidos=$_POST["txtapellidos"];
    $dni=$_POST["txtdni"];
    $sql=$conexion->query("update alumno set nombre='$nombre',apellidos='$apellidos',dni='$dni' where id_alumno=$id ");
    if ($sql == true){ ?>
        <script>
      $(function notificacion(){
        new PNotify({
          title:"CORRECTO",
          type:"success",
          text:"El alumno se ha modificado correctamente",
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
          text:"Error al modificar alumno",
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