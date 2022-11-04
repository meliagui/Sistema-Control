<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Control de Asistencia</title>
    <link rel="stylesheet" href="public/estilos/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- pNotify -->
    <link href="public/pnotify/css/pnotify.css" rel="stylesheet" />
        <link href="public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
        <link href="public/pnotify/css/custom.min.css" rel="stylesheet" />
    <!-- pnotify -->
    <script src="public/pnotify/js/jquery.min.js">
        </script>
        <script src="public/pnotify/js/pnotify.js">
        </script>
        <script src="public/pnotify/js/pnotify.buttons.js">
        </script>

</head>
<body>
    
        <h1>CONTROL DE ASISTENCIA DE ALUMNOS QR-CODE </h1>
        <h2>  IE. PEDRO MERCEDES UREÑA</h2>
        <h2 id= "fecha"></h2>
  
        <?php
        include 'modelo/conexion.php';
        include 'controlador/controlador_registrar_asistencia.php';
        ?>
      
     
      <div class= "container">
          <a class="acceso" href="vista/login/login.php">Ingresar al Sistema</a>
          <p class="dni">Ingrese su DNI</p> 
          <form class="form" action="" method="POST">
            <input type="text" placeholder=" DNI del Alumno" name="txtdni">
              <div class="botones">
              <button class="entrada" type="submit" name="btnentrada" value="ok">ENTRADA</button>
              <button class="salida" type="submit" name="btnsalida" value="ok">SALIDA</button>
              </div>
          </form>
      </div>
      <script>
             //setInterval(() => {
             let fecha= new Date();
           //  let fechaHora =fecha.toLocaleString();
             let fechaDia = fecha.getDay();
             //document.getElementById("fecha").textContent=fechaHora; 
             document.getElementById("fecha").textContent=fechaDia; 
           // }, 1000);
        </script>  
        
         
</body>
</html>