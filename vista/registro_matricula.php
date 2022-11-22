<?php
 session_start();
 if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
     header('location:login/login.php');
 }

?>
<style>
  ul li:nth-child(3) .activo{
    background: rgb(11, 150, 214) !important;
  }
  </style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

   <h4 class="text-center text-secondary">REGISTRO DE MATRICULAS</h4>

   <?php
   include '../modelo/conexion.php';
   include "../controlador/controlador_registrar_matricula.php"
   ?>
<div class="row">
  <form action="" method="POST">
  <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
    <select name="txtalumno" class="input input__select">
      <option value="">Seleccionar Alumno</option>
      <?php
      $sql=$conexion->query("select * from alumno");
      while ($datos=$sql->fetch_object()) { ?>
        <option value="<?= $datos->id_alumno ?>"><?= $datos->nombre. " ".$datos->apellidos?></option>
      <?php }
      ?>
    </select>
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
    <select name="txtnivel" class="input input__select">
      <option value="">Seleccionar nivel</option>
      <?php
      $sql=$conexion->query("select * from nivel");
      while ($datos=$sql->fetch_object()) { ?>
        <option value="<?= $datos->id_nivel ?>"><?= $datos->descripcion ?></option>
      <?php }
      ?>
    </select>
    </div>

    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
    <select name="txtgrado" class="input input__select">
      <option value="">Seleccionar grado</option>
      <?php
      $sql=$conexion->query("select * from grado");
      while ($datos=$sql->fetch_object()) { ?>
        <option value="<?= $datos->id_grado ?>"><?= $datos->descripcion ?></option>
      <?php }
      ?>
    </select>
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
    <select name="txtseccion" class="input input__select">
      <option value="">Seleccionar seccion</option>
      <?php
      $sql=$conexion->query("select * from seccion");
      while ($datos=$sql->fetch_object()) { ?>
        <option value="<?= $datos->id_seccion ?>"><?= $datos->descripcion ?></option>
      <?php }
      ?>
    </select>
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
      <input type="date"  class="input input__text" name="txtfecha">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
    <select name="txtturno" class="input input__select">
      <option value="">Seleccionar turno</option>
  
        <option value="dia">Mañana </option>
        <option value="tarde">Tarde </option>
      
    </select>
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
      <label for="">Hora entrada</label>
      <input type="time"  class="input input__text" name="txthoraentrada">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
    <label for="">Hora salida</label>
      <input type="time"  class="input input__text" name="txthorasalida">
    </div>

    <div class="text-right p-2 ">
      <a href="matricula.php" class="btn btn-secondary btn-rounded">Atras</a>
      <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">Registrar</button>

    </div>
  </form>

</div>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php');  ?>