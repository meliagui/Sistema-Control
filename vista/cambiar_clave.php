<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}
$id = $_SESSION["id"];
?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar2.php'); ?>
<!-- luego se carga el sidebar -->
<?php
// require('./layout/sidebar.php'); 
?>

<!-- inicio del contenido principal -->
<div class="page-content">

  <h4 class="text-center text-secondary">CAMBIAR CONTRASEÑA </h4>

  <?php
  include '../modelo/conexion.php';
  include "../controlador/controlador_cambiar_clave.php";

  $sql = $conexion->query("select * from usuario where id_usuario=$id");
  ?>

  <form action="" method="POST">
    <div class="row">
      <?php
      while ($datos = $sql->fetch_object()) { ?>
        <div hidden class="col-12 col-md-6">
          <input type="text" placeholder="ID" class="form-control" name="txtid" value="<?= $datos->id_usuario ?> ">
        </div>
        <div class="col-12 col-md-6">
          <div class="form-group">
            <label for="">Contraseña Actual</label>
            <input type="password" placeholder="Contraseña actual" class="form-control" name="txtclaveactual" value="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-group">
            <label for="">Contraseña Nueva</label>
            <input type="password" placeholder="Contraseña nueva" class="form-control" name="txtclavenueva" value="">
          </div>
        </div>

        <div class="col-12 text-center p-2">
          <button type="submit" value="ok" name="btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>

        </div>
      <?php }
      ?>
    </div>
  </form>



</div>

<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer2.php');  ?>