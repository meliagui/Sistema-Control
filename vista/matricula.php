<?php
 session_start();
 if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
     header('location:login/login.php');
 }

?>
<style> 
  ul li:nth-child(3) .activo{
    background: #f3f340 !important;
  }
  </style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

   <h4 class="text-center text-secondary">LISTA DE MATRICULAS</h4>

   <?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_modificar_matricula.php";
    include "../controlador/controlador_eliminar_matricula.php";

    $sql=$conexion->query("SELECT
    matricula.id_matricula, 
    matricula.turno, 
    matricula.fecha_matricula, 
    matricula.hora_entrada, 
    matricula.hora_salida, 
    matricula.id_alumno, 
    matricula.id_nivel, 
    matricula.id_grado, 
    matricula.id_seccion, 
    matricula.id_usuario, 
    alumno.id_alumno, 
    alumno.nombre, 
    alumno.apellidos, 
    alumno.dni, 
    nivel.id_nivel, 
    nivel.descripcion as desc_nivel, 
    grado.id_grado, 
    grado.descripcion as desc_grado, 
    seccion.id_seccion, 
    seccion.descripcion as desc_seccion 
    
  FROM
    matricula
    INNER JOIN
    alumno
    ON 
      matricula.id_alumno = alumno.id_alumno
    INNER JOIN
    nivel
    ON 
      matricula.id_nivel = nivel.id_nivel
    INNER JOIN
    grado
    ON 
      matricula.id_grado = grado.id_grado
    INNER JOIN
    seccion
    ON 
      matricula.id_seccion = seccion.id_seccion
    
    ");
  
    
    ?>
   <a href="registro_matricula.php" class="btn btn-primary btn-rounded mb-2"><i class="fa-solid fa-plus"></i> &nbsp;Registrar</a>
   <table class="table table-bordered table-striped border-primary w-100" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NOMBRE COMPLETO</th>
          <th scope="col">NIVEL</th>
          <th scope="col">GRADO</th>
          <th scope="col">SECCION</th>
          <th scope="col">FECHA</th>
          <th scope="col">TURNO</th>
          <th scope="col">H.ENTRADA</th>
          <th scope="col">H.SALIDA</th>
          <th></th>
        </tr>
      </thead>
  <tbody>
  <?php
      while($datos=$sql->fetch_object()) {?>
        <tr>
            <th><?= $datos->id_matricula ?></th>
            <td><?= $datos->nombre. " ".$datos->apellidos?></td>
            <td><?= $datos->desc_nivel?></td>
            <td><?= $datos->desc_grado?></td>
            <td><?= $datos->desc_seccion?></td>
            <td><?=  date('d/m/Y' , strtotime($datos->fecha_matricula)) ?></td>
            <td><?= $datos->turno?></td>
            <td><?= $datos->hora_entrada?></td>
            <td><?= $datos->hora_salida?></td>

            <td>
              <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->id_matricula ?>" class="btn btn-warning btn-sm"><i class="fa-solid  fa-pen-to-square"></i></a>
              <a href="matricula.php?id= <?= $datos->id_matricula ?>" onclick= "advertencia(event)" class= "btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
              </td>
        </tr>


<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $datos->id_matricula ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Matricula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
      <div hidden class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->id_matricula ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 ">
      <select name="txtalumno" class="input input__select">
        <?php
        $sql2 = $conexion->query("select * from alumno");
        while ($datos2 = $sql2->fetch_object()) { ?>
        <option <?= $datos->id_alumno==$datos2->id_alumno ? 'selected' : '' ?> value="<?= $datos2->id_alumno ?>"><?= $datos2->nombre. " ".$datos->apellidos?></option>
        <?php }
        ?>
      </select>
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <select name="txtnivel" class="input input__select">
        <?php
        $sql2 = $conexion->query("select * from nivel");
        while ($datos2 = $sql2->fetch_object()) { ?>
        <option <?= $datos->id_nivel==$datos2->id_nivel ? 'selected' : '' ?> value="<?= $datos2->id_nivel ?>"><?= $datos2->descripcion ?></option>
        <?php }
        ?>
      </select>
      </div>
    
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <select name="txtgrado" class="input input__select">
        <?php
        $sql2 = $conexion->query("select * from grado");
        while ($datos2 = $sql2->fetch_object()) { ?>
        <option <?= $datos->id_grado==$datos2->id_grado ? 'selected' : '' ?> value="<?= $datos2->id_grado ?>"><?= $datos2->descripcion ?></option>
        <?php }
        ?>
      </select>
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <select name="txtseccion" class="input input__select">
        <?php
        $sql2 = $conexion->query("select * from seccion");
        while ($datos2 = $sql2->fetch_object()) { ?>
        <option <?= $datos->id_seccion==$datos2->id_seccion ? 'selected' : '' ?> value="<?= $datos2->id_seccion ?>"><?= $datos2->descripcion ?></option>
        <?php }
        ?>
      </select>
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="Fecha" class="input input__text" name="txtfecha" value="<?= $datos->fecha_matricula ?>">
      </div>
      
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="Turno" class="input input__text" name="txtturno" value="<?= $datos->turno?>">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="HoraEntrada" class="input input__text" name="txthoraentrada" value="<?= $datos->hora_entrada?>">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="HoraSalida" class="input input__text" name="txthorasalida" value="<?= $datos->hora_salida?>">
      </div>

    <div class="text-right p-2">
      <a href="matricula.php" class="btn btn-secondary btn-rounded">Atras</a>
      <button type="submit" value="ok" name="btmodificar" class="btn btn-primary btn-rounded">Modificar</button>

    </div>
  </form>
      </div>
      
    </div>
  </div>
</div>
      <?php }
      ?>
    
    
  </tbody>
</table>
</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php');  ?>