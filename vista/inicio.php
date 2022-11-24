<?php
 session_start();
if (!empty($_POST["btnentrada"])) {
  if (!empty($_POST["txtdni"])) {
    $dni = $_POST["txtdni"];
    $consulta = $conexion->query("select count(*) as 'total' from   alumno a  inner join matricula m on a.id_alumno=m.id_alumno where a.dni='$dni' ");
    $id = $conexion->query("select m.id_matricula from   alumno a  inner join matricula m on a.id_alumno=m.id_alumno where a.dni='$dni' ");
    $horaEntrada = $conexion->query("select m.hora_entrada from alumno a  inner join matricula m on a.id_alumno=m.id_alumno where a.dni='$dni' ");
    if ($consulta->fetch_object()->total > 0) {
      $fecha = date("Y-m-d");
      $hora = date("H:i:s");
      $id_matricula = $id->fetch_object()->id_matricula;
      $hora_Entrada = $horaEntrada->fetch_object()->hora_entrada;
      $tardanza = null;
      //  Obtenemos la tardanza
      if (strtotime($hora) > strtotime("+15 minutes", strtotime($hora_Entrada))) {
        $inicio = new DateTime($hora);
        $fin = new DateTime(date('H:i:s', strtotime("+15 minutes", strtotime($hora_Entrada))));
        $diferencia = $inicio ->diff($fin);
        $tardanza = $diferencia->format('%H:%i:%s');
      }
      $sql = $conexion->query("insert into asistencia (id_matricula,fecha, entrada, tardanza) values ('$id_matricula', '$fecha', '$hora', '$tardanza') ");
      if ($sql == true) { ?>

        <script>
          $(function notificacion() {
            new PNotify({
              title: "CORRECTO",
              type: "success",
              text: "Se ha registrado su ENTRADA con éxito",
              styling: "bootstrap3"
            })
          })
        </script>
      <?php } else { ?>
        <script>
          $(function notificacion() {
            new PNotify({
              title: "INCORRECTO",
              type: "error",
              text: "Error al registrar ENTRADA",
              styling: "bootstrap3"
            })
          })
        </script>
      <?php }
    } else { ?>
      <script>
        $(function notificacion() {
          new PNotify({
            title: "INCORRECTO",
            type: "error",
            text: "El DNI ingresado no existe",
            styling: "bootstrap3"
          })
        })
      </script>
    <?php }
  } else { ?>
    <script>
      $(function notificacion() {
        new PNotify({
          title: "INCORRECTO",
          type: "error",
          text: "Ingrese el DNI",
          styling: "bootstrap3"
        })
      })
    </script>
  <?php } ?>
  <script>
    setTimeout(() => {
      window.history.replaceState(null, null, window.location.pathname);
    }, 0);
  </script>

<?php }

?>





<?php
if (!empty($_POST["btnsalida"])) {
  if (!empty($_POST["txtdni"])) {
    $dni = $_POST["txtdni"];
    $consulta = $conexion->query("select count(*) as 'total' from   alumno a  inner join matricula m on a.id_alumno=m.id_alumno where a.dni='$dni' ");
    $id = $conexion->query("select m.id_matricula from   alumno a  inner join matricula m on a.id_alumno=m.id_alumno where a.dni='$dni' ");
    if ($consulta->fetch_object()->total > 0) {
      $hora = date("h:i:s");
      $id_matricula = $id->fetch_object()->id_matricula;

      $busqueda = $conexion->query("select id_asistencia from asistencia where id_matricula=$id_matricula order by id_asistencia desc limit 1");
      $id_asistencia = $busqueda->fetch_object()->id_asistencia;
      $sql = $conexion->query("update asistencia set salida='$hora' where id_asistencia=$id_asistencia ");
      if ($sql == true) { ?>
        <script>
          $(function notificacion() {
            new PNotify({
              title: "CORRECTO",
              type: "success",
              text: "Se ha registrado su SALIDA con éxito",
              styling: "bootstrap3"
            })
          })
        </script>
      <?php } else { ?>
        <script>
          $(function notificacion() {
            new PNotify({
              title: "INCORRECTO",
              type: "error",
              text: "Error al registrar SALIDA",
              styling: "bootstrap3"
            })
          })
        </script>
      <?php }
    } else { ?>
      <script>
        $(function notificacion() {
          new PNotify({
            title: "INCORRECTO",
            type: "error",
            text: "El DNI ingresado no existe",
            styling: "bootstrap3"
          })
        })
      </script>
    <?php }
  } else { ?>
    <script>
      $(function notificacion() {
        new PNotify({
          title: "INCORRECTO",
          type: "error",
          text: "Ingrese el DNI",
          styling: "bootstrap3"
        })
      })
    </script>
  <?php } ?>
  <script>
    setTimeout(() => {
      window.history.replaceState(null, null, window.location.pathname);
    }, 0);
  </script>

<?php }

?>


