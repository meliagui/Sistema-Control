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
    
     <div class="container_title">
        <h1 class= "sistema">CONTROL DE ASISTENCIA DE ALUMNOS QR-CODE </h1>
        <h2 class="nombre">  IE. PEDRO MERCEDES UREÑA</h2>
      </div>

      <div class="wrap">
        <div class="widget">

          <div class="fecha">
            <p id="diaSemana" class="diaSemana"></p>
            <p id="dia" class="dia"></p>
            <p>de </p>
            <p id="mes" class="mes"></p>
            <p>del </p>
            <p id="year" class="year"></p>
          </div>

          <div class="reloj">
            <p id="horas" class="horas"></p>
            <p>:</p>
            <p id="minutos" class="minutos"></p>
            <p>:</p>
            <div class="caja-segundos">
              <p id="ampm" class="ampm"></p>
              <p id="segundos" class="segundos"></p>
            </div>
            
          </div>
          
        </div>
        
        
  
        <?php
        include 'modelo/conexion.php';
        include 'controlador/controlador_registrar_asistencia.php';
        ?>
     </div>
         <div class="container_padre">
         <div class= "container_QR">
            <p class= "QR">Escanear Codigo QR</p>
            <form class="form" action="">
              <input class= "escanear" type="text" placeholder=" QR" name="txtqr">
              <br>
         </div>
         <div class= "container_dni">
          <a class="acceso" href="vista/login/login.php">Ingresar al Sistema</a>
          <p class="dni">Ingrese su DNI</p> 
          <form class="form" action="" method="POST">
            <input type="text" placeholder=" DNI del Alumno" name="txtdni">
              <div class="botones">
              <br>
              <button class="entrada" type="submit" name="btnentrada" value="ok">ENTRADA</button>
              <button class="salida" type="submit" name="btnsalida" value="ok">SALIDA</button>
              </div>
          </form>
          </div>
         </div> 
        
          </div>  
          
          <script src="./vista/login/js/reloj.js"></script>
</body>
</html>