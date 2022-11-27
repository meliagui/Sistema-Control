<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Asistencia</title>
    <link rel="icon" type="image/png" href="{{ asset('images/img-02.ico') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../public/dist/css/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/bootstrap5/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/bootstrap4/css/bootstrap.min.css">



    <!-- De la anterior  plantilla -->
    <link rel="stylesheet" href="../public/app/publico/css/lib/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="../public/app/publico/css/separate/vendor/lobipanel.min.css">
    <link rel="stylesheet" href="../public/app/publico/css/lib/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" href="../public/app/publico/css/separate/pages/widgets.min.css">
    <link rel="stylesheet" href="../public/app/publico/css/separate/pages/widgets.min.css">

    <!-- datatables -->
    <!-- <link rel="stylesheet" href="../public/app/publico/css/lib/datatables-net/datatables.min.css">
    <link rel="stylesheet" href="../public/app/publico/css/separate/vendor/datatables-net.min.css"> -->
    <link rel="stylesheet" href="../public/dist/css/dataTables.bootstrap4.min.css">
    <style>
        .paginate_button {
            /* margin-right: 3em; */
            padding: 1px 1px;
            font-size: 15px;
            border-radius: 6px;
            border: 1px solid #474747;
            cursor: pointer;
            background: #0274d8;
            color: #ffffff;
        }   
    </style>
    <link href="../public/app/publico/css/mis_estilos/estilos.css" rel="stylesheet">

    <!-- form -->
    <link rel="stylesheet" type="text/css" href="../public/app/publico/css/lib/jquery-flex-label/jquery.flex.label.css"> <!-- Original -->

    <!-- mis estilos -->
    <link href="../public/principal/css/estilos.css" rel="stylesheet">

    <!-- pNotify -->
    <link href="../public/pnotify/css/pnotify.css" rel="stylesheet" />
    <link href="../public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
    <link href="../public/pnotify/css/custom.min.css" rel="stylesheet" />

    <!-- google fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- pnotify -->
    <script src="../public/pnotify/js/jquery.min.js">
    </script>
    <script src="../public/pnotify/js/pnotify.js">
    </script>
    <script src="../public/pnotify/js/pnotify.buttons.js">
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light" style="background: #A1D03B;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-sort-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <h5 class="p-2 text-center bg-dark"><?= $_SESSION["nombre"] . " " . $_SESSION["apellido"] ?></h5>
                        <a class="dropdown-item" href="perfil.php"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                        <a class="dropdown-item" href="cambiar_clave.php"><span class="font-icon glyphicon glyphicon-lock"></span>Cambiar contraseña</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../controlador/controlador_cerrar_sesion.php">
                            <span class="font-icon glyphicon glyphicon-log-out"></span>salir
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-info elevation-4" >
            <a href="{{ asset('dashboard-administrador') }}" class="brand-link" style="background: #A1D03B;">
                <!-- <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="Ad" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-dark text-dark">Sistema de Asistencia</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
                        <img src="{{ asset('Imagen/' . auth()->user()->foto) }}" class="img-circle elevation-2" alt="User Image">
                    </div> -->
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION["nombre"] . " " . $_SESSION["apellido"] ?></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link {{ 'asistencia' == request()->segment(1) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Asistencia
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="inicio.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "inicio")) {
                                                                                echo "active";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Informe</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link {{ 'caja' == request()->segment(1) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    Registro
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="alumno.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "alumno")) {
                                                                                echo "active";
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Alumnos</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="matricula.php" class="nav-link  <?php if (strpos($_SERVER['REQUEST_URI'], "matricula")) {
                                                                                    echo "active";
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Matricula</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link {{ 'acceso' == request()->segment(1) ? 'active' : '' }}">
                                <i class=" nav-icon fas fa-user-cog"></i>
                                <p>
                                    Acceso
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="usuario.php" class="nav-link {{ 'usuarios' == request()->segment(2) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">