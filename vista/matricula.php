<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}
?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar2.php'); ?>
<!-- luego se carga el sidebar -->
<?php
// require('./layout/sidebar.php'); 
?>

<?php
include "../modelo/conexion.php";
include "../controlador/controlador_modificar_matricula.php";
include "../controlador/controlador_eliminar_matricula.php";

$sql = $conexion->query("SELECT
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
      matricula.id_seccion = seccion.id_seccion");
?>
<!-- inicio del contenido principal -->
<div class="page-content">
  <h4 class="text-center text-secondary">LISTA DE MATRICULAS</h4>
  <a href="registro_matricula.php" class="btn btn-primary btn-rounded mb-2"><i class="fas fa-plus"></i> &nbsp;Registrar</a>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped border-primary" id="example">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NOMBRE COMPLETO</th>
                  <th scope="col">NIVEL</th>
                  <th scope="col">GRADO</th>
                  <th scope="col">SECCION</th>
                  <th scope="col">FECHA</th>
                  <th scope="col">TURNO</th>
                  <th scope="col">H.ENT.</th>
                  <th scope="col">H.SAL.</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($datos = $sql->fetch_object()) { ?>
                  <tr>
                    <th><?= $datos->id_matricula ?></th>
                    <td><?= $datos->nombre . " " . $datos->apellidos ?></td>
                    <td><?= $datos->desc_nivel ?></td>
                    <td><?= $datos->desc_grado ?></td>
                    <td><?= $datos->desc_seccion ?></td>
                    <td><?= $datos->fecha_matricula ?></td>
                    <td><?= $datos->turno ?></td>
                    <td><?= $datos->hora_entrada ?></td>
                    <td><?= $datos->hora_salida ?></td>

                    <td>
                      <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->id_matricula ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                    </td>
                    <td>
                      <a href="matricula.php?id= <?= $datos->id_matricula ?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
                            <div class="row">
                              <div hidden class="col-12">
                                <input type="text" placeholder="ID" class="form-control" name="txtid" value="<?= $datos->id_matricula ?>">
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="">Alumno</label>
                                  <select name="txtalumno" class="form-control selectpicker" data-live-search="true">
                                    <?php
                                    $sql2 = $conexion->query("select * from alumno");
                                    while ($datos2 = $sql2->fetch_object()) { ?>
                                      <option <?= $datos->id_alumno == $datos2->id_alumno ? 'selected' : '' ?> value="<?= $datos2->id_alumno ?>"><?= $datos2->nombre . " " . $datos2->apellidos ?></option>
                                    <?php }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 col-12 ">
                                <div class="form-group">
                                  <label for="">Nivel</label>
                                  <select name="txtnivel" class="form-control">
                                    <?php
                                    $sql2 = $conexion->query("select * from nivel");
                                    while ($datos2 = $sql2->fetch_object()) { ?>
                                      <option <?= $datos->id_nivel == $datos2->id_nivel ? 'selected' : '' ?> value="<?= $datos2->id_nivel ?>"><?= $datos2->descripcion ?></option>
                                    <?php }
                                    ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6 col-12 ">
                                <div class="form-group">
                                  <label for="">Grado</label>
                                  <select name="txtgrado" class="form-control">
                                    <?php
                                    $sql2 = $conexion->query("select * from grado");
                                    while ($datos2 = $sql2->fetch_object()) { ?>
                                      <option <?= $datos->id_grado == $datos2->id_grado ? 'selected' : '' ?> value="<?= $datos2->id_grado ?>"><?= $datos2->descripcion ?></option>
                                    <?php }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 col-12 ">
                                <div class="form-group">
                                  <label for="">Sección</label>
                                  <select name="txtseccion" class="form-control">
                                    <?php
                                    $sql2 = $conexion->query("select * from seccion");
                                    while ($datos2 = $sql2->fetch_object()) { ?>
                                      <option <?= $datos->id_seccion == $datos2->id_seccion ? 'selected' : '' ?> value="<?= $datos2->id_seccion ?>"><?= $datos2->descripcion ?></option>
                                    <?php }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 col-12 ">
                                <div class="form-group">
                                  <label for="">F. Matrícula</label>
                                  <input type="date" placeholder="Fecha" class="form-control" name="txtfecha" value="<?= $datos->fecha_matricula ?>">
                                </div>
                              </div>

                              <div class="col-md-6 col-12 ">
                                <div class="form-group">
                                  <label for="">Turno</label>
                                  <input type="text" placeholder="Turno" class="form-control" name="txtturno" value="<?= $datos->turno ?>">
                                </div>
                              </div>
                              <div class="col-md-6 col-12 ">
                                <div class="form-group">
                                  <label for="">H. Entrada</label>
                                  <input type="time" placeholder="HoraEntrada" class="form-control" name="txthoraentrada" value="<?= $datos->hora_entrada ?>">
                                </div>
                              </div>
                              <div class="col-md-6 col-12 ">
                                <div class="form-group">
                                  <label for="">H. Salida</label>
                                  <input type="time" placeholder="HoraSalida" class="form-control" name="txthorasalida" value="<?= $datos->hora_salida ?>">
                                </div>
                              </div>
                              <div class="col-12 text-center p-2">
                                <a href="matricula.php" class="btn btn-secondary btn-rounded">Atras</a>
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
</div>

<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer2.php');  ?>