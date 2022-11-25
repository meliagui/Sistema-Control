<?php
session_start();
session_destroy();
header("location:/https://sistema-control-production.up.railway.app/vista/login/login.php");
//header("location:/Sistema-Control/vista/login/login.php");
?>
