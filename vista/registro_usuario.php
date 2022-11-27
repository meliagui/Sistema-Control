<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}

?>
<style>
  ul li:nth-child(4) .activo {
    background: rgb(11, 150, 214) !important;
  }
</style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar2.php'); ?>
<!-- luego se carga el sidebar -->
<?php
// require('./layout/sidebar.php'); 
?>

<!-- inicio del contenido principal -->
<div class="page-content">

  <h4 class="text-center text-secondary">REGISTRO DE USUARIOS</h4>

  <?php
  include '../modelo/conexion.php';
  include "../controlador/controlador_registrar_usuario.php"
  ?>

  <form action="" method="POST">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Nombres</label>
          <input type="text" placeholder="Nombre" class="form-control" name="txtnombre" required>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Apellidos</label>
          <input type="text" placeholder="Apellido" class="form-control" name="txtapellido" required>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Usuario</label>
          <input type="text" placeholder="Usuario" class="form-control" name="txtusuario" required>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Contraseña</label>
          <input type="password" placeholder="Contraseña" class="form-control" name="txtpassword" required>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Estado</label>
          <input type="text" placeholder="Estado" class="form-control" name="txtestado" required>
        </div>
      </div>
      <div class="col-12 text-center p-2">
        <a href="usuario.php" class="btn btn-secondary btn-rounded">Atras</a>
        <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">Registrar</button>

      </div>
    </div>
  </form>



</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer2.php');  ?>