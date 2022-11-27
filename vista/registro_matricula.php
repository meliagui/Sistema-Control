<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}
?>
<style>
  ul li:nth-child(3) .activo {
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
  <h4 class="text-center text-secondary">REGISTRO DE MATRICULAS</h4>
  <?php
  include '../modelo/conexion.php';
  include "../controlador/controlador_registrar_matricula.php"
  ?>

  <form action="" method="POST">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Alumno </label>
          <select name="txtalumno" class="form-control selectpicker" data-live-search="true" required>
            <option value="">Seleccionar</option>
            <?php
            $sql = $conexion->query("select * from alumno");
            while ($datos = $sql->fetch_object()) { ?>
              <option value="<?= $datos->id_alumno ?>"><?= $datos->dni . " | " . $datos->nombre . " " . $datos->apellidos ?></option>
            <?php }
            ?>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Nivel</label>
          <select name="txtnivel" class="form-control" required>
            <option value="">Seleccionar</option>
            <?php
            $sql = $conexion->query("select * from nivel");
            while ($datos = $sql->fetch_object()) { ?>
              <option value="<?= $datos->id_nivel ?>"><?= $datos->descripcion ?></option>
            <?php }
            ?>
          </select>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Grado</label>
          <select name="txtgrado" class="form-control" required>
            <option value="">Seleccionar</option>
            <?php
            $sql = $conexion->query("select * from grado");
            while ($datos = $sql->fetch_object()) { ?>
              <option value="<?= $datos->id_grado ?>"><?= $datos->descripcion ?></option>
            <?php }
            ?>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Sección</label>
          <select name="txtseccion" class="form-control" required>
            <option value="">Seleccionar </option>
            <?php
            $sql = $conexion->query("select * from seccion");
            while ($datos = $sql->fetch_object()) { ?>
              <option value="<?= $datos->id_seccion ?>"><?= $datos->descripcion ?></option>
            <?php }
            ?>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Fecha</label>
          <input type="date" class="form-control" name="txtfecha">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Turno</label>
          <select name="txtturno" class="form-control" required>
            <option value="">Seleccionar</option>
            <option value="dia">Mañana </option>
            <option value="tarde">Tarde </option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Hora entrada</label>
          <input type="time" class="form-control" name="txthoraentrada">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="">Hora salida</label>
          <input type="time" class="form-control" name="txthorasalida">
        </div>
      </div>

      <div class="col-12 text-center p-2 ">
        <a href="matricula.php" class="btn btn-secondary btn-rounded">Atras</a>
        <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">Registrar</button>
      </div>
    </div>
  </form>



</div>

<!-- fin del contenido principal -->

<!-- por ultimo se carga el footer -->
<?php require('./layout/footer2.php'); ?>