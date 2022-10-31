<?php
if (!empty($_POST["btmodificar"])) {
  if (!empty($_POST["txtid"]) and !empty($_POST["txtnombre"]) and !empty($_POST["txtapellidos"]) and !empty($_POST["txtdni"]) and !empty($_POST["txtnivel"]) and !empty($_POST["txtgrado"]) and !empty($_POST["txtseccion"])) {
    $id=$_POST["txtid"];
    $nombre=$_POST["txtnombre"];
    $apellidos=$_POST["txtapellidos"];
    $dni=$_POST["txtdni"];
    $nivel=$_POST["txtnivel"];
    $grado=$_POST["txtgrado"];
    $seccion=$_POST["txtseccion"];
    $sql=$conexion->query("update alumno set nombre='$nombre',apellidos='$apellidos',dni='$dni',id_nivel='$nivel',id_grado='$grado', id_seccion='$seccion' where id_alumno=$id ");
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
          text:"Los chanchos no vuelan",
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