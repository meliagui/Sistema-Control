<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtalumno"])
     and !empty($_POST["txtfecha"]) and !empty($_POST["txtnivel"]) and !empty($_POST["txtgrado"]) 
     and !empty($_POST["txtseccion"]) and !empty($_POST["txtturno"]) and !empty($_POST["txthoraentrada"]) and !empty($_POST["txthorasalida"])) {
        $alumno=$_POST["txtalumno"];
        $nivel=$_POST["txtnivel"];
        $grado=$_POST["txtgrado"];
        $seccion=$_POST["txtseccion"];
        $fecha=$_POST["txtfecha"];
        $turno=$_POST["txtturno"];
        $horaentrada=$_POST["txthoraentrada"];
        $horasalida=$_POST["txthorasalida"];
        $id=$_SESSION["id"];

      

        $sql=$conexion->query ("select count(*) as 'total' from matricula where id_alumno='$alumno' and id_nivel='$nivel' and id_grado='$grado' and id_seccion='$seccion'");
        if ($sql->fetch_object()->total>0) { ?>
    <script>
      $(function notificacion(){
        new PNotify({
          title:"ERROR",
          type:"error",
          text:"La matricula ya existe",
          styling:"bootstrap3"
        })
      })
    </script>
        <?php } else {
            $sql=$conexion->query("insert into matricula (id_usuario,id_alumno,turno,fecha_matricula,hora_entrada,hora_salida,id_nivel,id_grado,id_seccion) values('$id','$alumno','$turno','$fecha','$horaentrada','$horasalida','$nivel','$grado','$seccion')");
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