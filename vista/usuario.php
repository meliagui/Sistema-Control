<?php
 session_start();
 if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
     header('location:login/login.php');
 }

?>
<style> 
  ul li:nth-child(2) .activo{
    background: rgb(11, 150, 214) !important;
  }
  </style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

   <h4 class="text-center text-secondary">LISTA DE USUARIOS</h4>

   <?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_eliminar_asistencia.php";
    $sql=$conexion->query("SELECT * from usuario");

    
    ?>

   <table class="table table-bordered table-striped border-primary w-100" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDO</th>
          <th scope="col">USUARIO</th>
          <th></th>
        </tr>
      </thead>
  <tbody>
  <?php
      while($datos=$sql->fetch_object()) {?>
        <tr>
            <th><?= $datos->id_usuario ?></th>
            <td><?= $datos->nombre?></td>
            <td><?= $datos->apellido ?></td>
            <td><?= $datos->usuario?></td>
            <td>
              <a href="inicio.php?id=<?=$datos->id_usuario ?>" onclick= "advertencia(event)" class= "btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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
<?php require('./layout/footer.php');  ?>