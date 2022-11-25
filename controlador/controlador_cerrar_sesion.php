<?php
session_start();
session_destroy();
header("location:/Sistema-Control/vista/login/login.php");
?>
