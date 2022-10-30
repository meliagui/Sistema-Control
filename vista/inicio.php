<?php
 session_start();
 if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
     header('location:login/login.php');
 }

?>
<style> 
  ul li:nth-child(1) .activo{
    background: rgb(11, 150, 214) !important;
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
	asistencia.id_alumno, 
	asistencia.id_usuario, 
	asistencia.fecha, 
	asistencia.entrada, 
	asistencia.salida, 
	asistencia.tardanza, 
	alumno.id_alumno, 
	alumno.id_nivel, 
	alumno.id_grado, 
	alumno.id_seccion, 
	alumno.nombre as 'nom_alumno', 
	alumno.apellidos, 
	alumno.dni, 
	grado.id_grado, 
	grado.nombre as 'nom_grado', 
    seccion.id_seccion, 
	seccion.nombre as 'nom_seccion', 
	nivel.id_nivel, 
	nivel.nombre as 'nom_nivel'
FROM
	alumno
	INNER JOIN asistencia ON alumno.id_alumno = asistencia.id_alumno
	INNER JOIN nivel ON alumno.id_nivel = nivel.id_nivel
	INNER JOIN grado ON alumno.id_grado = grado.id_grado
	INNER JOIN seccion ON alumno.id_seccion = seccion.id_seccion");

    ?>

   <table class="table table-bordered table-striped border-primary w-100" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ALUMNO</th>
          <th scope="col">DNI</th>
          <th scope="col">NIVEL</th>
          <th scope="col">AÑO</th>
          <th scope="col">FECHA</th>
          <th scope="col">ENTRADA</th>
          <th scope="col">SALIDA</th>
          <th scope="col">TARDANZA</th>
          <th></th>
        </tr>
      </thead>
  <tbody>
  <?php
      while($datos=$sql->fetch_object()) {?>
        <tr>
            <th><?= $datos->id_asistencia ?></th>
            <td><?= $datos->nom_alumno . " ".$datos->apellidos ?></td>
            <td><?= $datos->dni ?></td>
            <td><?= $datos->nom_nivel ?></td>
            <td><?= $datos->nom_grado. " ".$datos->nom_seccion ?></td>
            <td><?= $datos->fecha ?></td>
            <td><?= $datos->entrada ?></td>
            <td><?= $datos->salida ?></td>
            <td><?= $datos->tardanza ?></td>
            <td>
              <a href="inicio.php?id=<?=$datos->id_asistencia ?>" onclick= "advertencia(event)" class= "btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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