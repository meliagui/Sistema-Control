<?php
session_start();
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["usuario"]) ) {
    $usuario=$_POST["usuario"];
    $password=($_POST["password"]);
    $sql=$conexion->query("select * from usuario where usuario='$usuario' and password='$password'");
    if ($datos=$sql->fetch_object()) {
       $_SESSION["nombre"]=$datos->nombre;
       $_SESSION["apellido"]=$datos->apellido;
       $_SESSION["id"]=$datos->id_usuario;
       echo "this is output";
      header("location:../inicio.php");
    } else {
        echo "<div class='alert-danger'>El usuario no existe</div>";
    }
    
} else {
        echo "<div class='alert-danger'>Los campos estan vacios</div>";
    }
}
?>