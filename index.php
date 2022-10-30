<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Bienvenida</title>
    <link rel="stylesheet" href="public/estilos/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&family=Playfair+Display:ital,wght@0,600;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <h1>CONTROL DE ASISTENCIA DE ALUMNOS QR-CODE</h1>
    <h2>IE. PEDRO MERCEDES UREÑA</h2>
    <h2 id= "fecha"> </h2>
    <div>
        <div class="container">
            <a  class="acceso" href="vista/login/login.php">Ingresar al Sistema</a>
            <p class="dni">Ingrese su DNI</p> 
            <form action="">
                <input type="text" placeholder=" DNI del Alumno" name="txtdni">
                <div class="botones">
                    <a class= "entrada" href="">ENTRADA</a>
                    <a class= "salida" href="">SALIDA</a>
                </div>
            </form>
        </div>

    <script>
       setInterval(() => {
            let fecha= new Date();
            let fechaHora =fecha.toLocaleString();
            document.getElementById("fecha").textContent=fechaHora;   
       }, 1000); 
    </script>


</body>
</html>
