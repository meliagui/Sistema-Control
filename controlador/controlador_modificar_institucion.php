<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtid"])) {
        $id=$_POST["txtid"];
        $nombre=$_POST["txtnombre"];
        $direccion=$_POST["txtdireccion"];
        $telefono=$_POST["txttelefono"];
        $ruc=$_POST["txtruc"];
        $sql=$conexion->query("update institucion set nombre='$nombre',direccion='$direccion', telefono='$telefono', RUC='$ruc' where id_institucion=$id ");
        if ($sql==true) { ?>
    <script>
      $(function notificacion() {
        new PNotify({
          title:"CORRECTO",
          type:"success",
          text:"Los datos se modificaron correctamente",
          styling:"bootstrap3"
        })
      })
    </script> 
        <?php } else { ?>
     <script>
      $(function notificacion() {
        new PNotify({
          title:"INCORRECTO",
          type:"error",
          text:"Error al modificar los datos",
          styling:"bootstrap3"
        })
      })
    </script>      
       <?php }
        
    } else { ?>
    <script>
      $(function notificacion() {
        new PNotify({
          title:"INCORRECTO",
          type:"error",
          text:"No se ha enviado el id",
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