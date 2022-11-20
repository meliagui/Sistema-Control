<?php
if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("delete from matricula where id_matricula= $id ");
    if ($sql==true) { ?>
    <script>
      $(function notificacion() {
        new PNotify({
          title:"CORRECTO",
          type:"success",
          text:"Matricula eliminada correctamente",
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
          text:"Error al eliminar matricula",
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