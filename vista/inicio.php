<?php
 //session_start();
 if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
     header('location:login/login.php');
 }

?>
<style> 
  ul li:nth-child(1) .activo{
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
    $sql=$conexion->query("SELECT
    
    asistencia.id_asistencia, 
    asistencia.fecha, 
    asistencia.entrada, 
    asistencia.salida, 
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
      matricula.id_matricula = asistencia.id_matricula");

    ?>
    <div class="text-left mb-2">

     <a href="fpdf/ReporteAsistencia.php" target= "_blank"class="btn btn-success"> <i class="fas fa-file-pdf"></i>GENERAR REPORTES</a>

    </div>
   <table class="table table-bordered table-striped border-primary w-100" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ALUMNO</th>
          <th scope="col">DNI</th>
          <th scope="col">FECHA</th>
          <th scope="col">ENTRADA</th>
          <th scope="col">SALIDA</th>
          <th></th>
        </tr>
      </thead>
  <tbody>
  <?php
      while($datos=$sql->fetch_object()) {?>
        <tr>
            <th><?= $datos->id_asistencia ?></th>
            <td><?= $datos->nombre . " ".$datos->apellidos ?></td>
            <td><?= $datos->dni ?></td>
            <td><?= $datos->fecha ?></td>
            <td><?= $datos->entrada ?></td>
            <td><?= $datos->salida ?></td>
            <td>
              <a href="inicio.php?id=<?=$datos->id_asistencia?>" onclick= "advertencia(event)" class= "btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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