<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}
?>
<?php require('./layout/topbar2.php'); ?>
<?php
include "../modelo/conexion.php";
include "../controlador/controlador_modificar_alumno.php";
include "../controlador/controlador_eliminar_alumno.php";
$sql = $conexion->query("SELECT * from alumno");
?>
<div class="row">
  <div class="col-12">
    <h4 class="text-center text-secondary">LISTA DE ALUMNOS</h4>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="registro_alumno.php" class="btn btn-primary btn-rounded mb-2"><i class="fas fa-plus"></i>&nbsp;Registrar</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped border-primary" id="example">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDOS</th>
                <th scope="col">DNI</th>
                <th></th>
                <th></th>

              </tr>
            </thead>
            <tbody>
              <?php
              while ($datos = $sql->fetch_object()) { ?>
                <tr>
                  <th><?= $datos->id_alumno ?></th>
                  <td><?= $datos->nombre ?></td>
                  <td><?= $datos->apellidos ?></td>
                  <td><?= $datos->dni ?></td>
                  <td>
                    <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->id_alumno ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  </td>
                  <td>
                    <a href="alumno.php?id= <?= $datos->id_alumno ?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
                          <div class="row">
                            <div hidden class="col-md-6 col-12">
                              <div class="form-group">
                                <input type="text" placeholder="ID" class="form-control" name="txtid" value="<?= $datos->id_alumno ?>">
                              </div>
                            </div>
                            <div class="col-md-6 col-12">
                              <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" placeholder="Nombre" class="form-control" name="txtnombre" value="<?= $datos->nombre ?>">
                              </div>
                            </div>
                            <div class="col-md-6 col-12">
                              <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" placeholder="Apellidos" class="form-control" name="txtapellidos" value="<?= $datos->apellidos ?>">
                              </div>
                            </div>
                            <div class="col-md-6 col-12">
                              <div class="form-group">
                                <label for="">N° DNI</label>
                                <input type="text" placeholder="DNI" class="form-control" name="txtdni" value="<?= $datos->dni ?>">
                              </div>
                            </div>

                            <div class="col-12 text-center p-2">
                              <a href="alumno.php" class="btn btn-secondary btn-rounded">Atras</a>
                              <button type="submit" value="ok" name="btmodificar" class="btn btn-primary btn-rounded">Modificar</button>
                            </div>
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
    </div>
  </div>
</div>
<?php require('./layout/footer2.php');  ?>