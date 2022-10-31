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

   <h4 class="text-center text-secondary">LISTA DE ALUMNOS</h4>

   <?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_modificar_alumno.php";
    include "../controlador/controlador_eliminar_alumno.php";

    $sql=$conexion->query("SELECT

    dbcontrol.alumno.id_alumno, 
    dbcontrol.alumno.nombre, 
    dbcontrol.alumno.apellidos, 
    dbcontrol.alumno.dni,
    dbcontrol.alumno.id_nivel, 
    dbcontrol.alumno.id_grado, 
    dbcontrol.alumno.id_seccion, 
    dbcontrol.nivel.nombre as 'nom_nivel', 
    dbcontrol.grado.nombre as 'nom_grado', 
    dbcontrol.seccion.nombre as 'nom_seccion'
  FROM
    dbcontrol.alumno
    INNER JOIN dbcontrol.nivel ON dbcontrol.alumno.id_nivel = dbcontrol.nivel.id_nivel
    INNER JOIN dbcontrol.grado ON dbcontrol.alumno.id_grado = dbcontrol.grado.id_grado
    INNER JOIN dbcontrol.seccion ON dbcontrol.alumno.id_seccion = dbcontrol.seccion.id_seccion");

    
    ?>
   <a href="registro_alumno.php" class="btn btn-primary btn-rounded mb-2"><i class="fa-solid fa-plus"></i> &nbsp;Registrar</a>
   <table class="table table-bordered table-striped border-primary w-100" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDOS</th>
          <th scope="col">DNI</th>
          <th scope="col">NIVEL</th>
          <th scope="col">GRADO</th>
          <th scope="col">SECCIÓN</th>
          <th></th>
        </tr>
      </thead>
  <tbody>
  <?php
      while($datos=$sql->fetch_object()) {?>
        <tr>
            <th><?= $datos->id_alumno ?></th>
            <td><?= $datos->nombre?></td>
            <td><?= $datos->apellidos?></td>
            <td><?= $datos->dni?></td>
            <td><?= $datos->nom_nivel?></td>
            <td><?= $datos->nom_grado?></td>
            <td><?= $datos->nom_seccion?></td>
            <td>
              <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->id_alumno ?>" class="btn btn-warning btn-sm"><i class="fa-solid  fa-pen-to-square"></i></a>
              <a href="alumno.php?id= <?= $datos->id_alumno ?>" onclick= "advertencia(event)" class= "btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
              </td>
        </tr>


<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $datos->id_alumno ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
      <div hidden class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->id_alumno ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre" value="<?= $datos->nombre ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="Apellidos" class="input input__text" name="txtapellidos" value="<?= $datos->apellidos ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 ">
      <input type="text" placeholder="DNI" class="input input__text" name="txtdni" value="<?= $datos->dni ?>">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <select name="txtnivel" class="input input__select">
        <?php
        $sql2 = $conexion->query("select * from nivel");
        while ($datos2 = $sql2->fetch_object()) { ?>
        <option <?= $datos->id_nivel==$datos2->id_nivel ? 'selected' : '' ?> value="<?= $datos2->id_nivel ?>"><?= $datos2->nombre ?></option>
        <?php }
        ?>
      </select>
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <select name="txtgrado" class="input input__select">
        <?php
        $sql2 = $conexion->query("select * from grado");
        while ($datos2 = $sql2->fetch_object()) { ?>
        <option <?= $datos->id_grado==$datos2->id_grado ? 'selected' : '' ?> value="<?= $datos2->id_grado ?>"><?= $datos2->nombre ?></option>
        <?php }
        ?>
      </select>
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 ">
      <select name="txtseccion" class="input input__select">
        <?php
        $sql2 = $conexion->query("select * from seccion");
        while ($datos2 = $sql2->fetch_object()) { ?>
        <option <?= $datos->id_seccion==$datos2->id_seccion ? 'selected' : '' ?> value="<?= $datos2->id_seccion ?>"><?= $datos2->nombre ?></option>
        <?php }
        ?>
      </select>
      </div>
    <div class="text-right p-2">
      <a href="alumno.php" class="btn btn-secondary btn-rounded">Atras</a>
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