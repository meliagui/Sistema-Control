<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtnombre"]) and !empty($_POST["txtapellidos"]) and !empty($_POST["txtdni"])) {
        $nombre=$_POST["txtnombre"];
        $apellidos=$_POST["txtapellidos"];
        $dni=$_POST["txtdni"];

        $sql=$conexion->query ("select count(*) as 'total' from alumno where dni='$dni' ");
        if ($sql->fetch_object()->total>0) { ?>
    <script>
      $(function notificacion(){
        new PNotify({
          title:"ERROR",
          type:"error",
          text:"El DNI <?=$dni ?> ya existe",
          styling:"bootstrap3"
        })
      })
    </script>
        <?php } else {
            $sql=$conexion->query("insert into alumno (nombre, apellidos,dni) values('$nombre','$apellidos','$dni')");
            if ($sql==true) {?>
    <script>
      $(function notificacion(){
        new PNotify({
          title:"CORRECTO",
          type:"success",
          text:"El alumno se ha registrado correctamente",
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
          text:"Error al registrar alumno",
          styling:"bootstrap3"
        })
      })
    </script>    
          <?php  }
            
        }
        
    } else { ?>
    <script>
      $(function notificacion(){
        new PNotify({
          title:"ERROR",
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