<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}

?>
<style>
  ul li:nth-child(1) .activo {
    background: #f3f340 !important;
  }
</style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

  <h4 class="text-center text-secondary">ASISTENCIA DE ALUMNOS</h4>
  <?php
  include "../modelo/conexion.php";
  include "../controlador/controlador_eliminar_asistencia.php";
  $fechainicio = empty($_GET['fInicio']) ? date('Y-m-01') : $_GET['fInicio'];
  $fechafinal = empty($_GET['fFinal']) ? date('Y-m-t') : $_GET['fFinal'];
  $sql = $conexion->query("SELECT
    asistencia.id_asistencia, 
    asistencia.fecha, 
    asistencia.entrada, 
    asistencia.salida, 
    asistencia.tardanza, 
    asistencia.id_matricula, 
    matricula.id_matricula, 
    matricula.id_alumno, 
    alumno.id_alumno, 
    alumno.nombre, 
    alumno.dni, 
    alumno.apellidos
  FROM
    matricula
    INNER JOIN
    alumno
    ON 
      matricula.id_alumno = alumno.id_alumno
    INNER JOIN
    asistencia
    ON 
      matricula.id_matricula = asistencia.id_matricula
    WHERE (fecha BETWEEN '$fechainicio' AND '$fechafinal')");

  ?>
  <div class="row" style="margin-bottom: 2em">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
      <div class="col-md-3 col-12">
        <a href="fpdf/ReporteAsistencia.php?fInicio=<?php echo $fechainicio ?>&fFinal=<?php echo $fechafinal ?>" target="_blank" class="btn btn-success" style="margin-top: 1.4em" > <i class="fas fa-file-pdf"></i>GENERAR REPORTES</a>
      </div>
      <div class="col-md-3 col-6">
        <label for="">Desde:</label>
        <input type="date" name="fInicio" value="<?php echo $fechainicio ?>" class="form-control corm-control-sm">
      </div>
      <div class="col-md-3 col-6">
        <label for="">Hasta:</label>
        <input type="date" name="fFinal" value="<?php echo $fechafinal ?>" class="form-control corm-control-sm">
      </div>
      <div class="col-md-3 col-6">
        <input type="submit" class="btn btn-primary" style="margin-top: 1.4em" name="submit" value="Buscar">
      </div>
    </form>
  </div>
  <!-- <div class="text-left mb-2">
  </div> -->
  <table class="table table-bordered table-striped border-primary w-100" id="example">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">ALUMNO</th>
        <th scope="col">DNI</th>
        <th scope="col">FECHA</th>
        <th scope="col">ENTRADA</th>
        <th scope="col">SALIDA</th>
        <th scope="col">TARDANZA</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($datos = $sql->fetch_object()) { ?>
        <tr>
          <th><?= $datos->id_asistencia ?></th>
          <td><?= $datos->nombre . " " . $datos->apellidos ?></td>
          <td><?= $datos->dni ?></td>
          <td><?=  date('d/m/Y' , strtotime($datos->fecha)) ?></td>
          <td><?= $datos->entrada ?></td>
          <td><?= $datos->salida ?></td>
          <td><?= $datos->tardanza ?></td>
          <td>
            <a href="inicio.php?id=<?= $datos->id_asistencia ?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      <?php }
      ?>


    </tbody>
  </table>
</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>