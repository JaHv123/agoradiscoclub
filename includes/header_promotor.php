<?php
    session_start();

    require "connection.php";

    if(isset($_SESSION['role'])){
        if($_SESSION['role'] != 'Administrador'){
            header('Location:user.php');
        }
    }else{
        header('Location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
      
    <title>Administrador</title>
</head>
<body>
   
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-white" >
                <img src="imagenes/AGORA-DISCO-LOGO-01.png" alt="" height="40px">
            </a>
            <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=navbar-toggler-icon></span>
            </button>
            <div class="collapse navbar-collapse " id="menu">
                <ul class="navbar-nav mr-auto ">
                <li class="nav-item active dropdown">
                        <a href="admin.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <li class="navbar-nav mr-auto"><a href="admin.php" class="nav-link">Registrar Usuarios</a></li>
                        </ul>
                    </li>               
                    <li class="nav-item active dropdown">
                        <a href="admin.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Eventos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <li class="navbar-nav mr-auto "><a href="create_evento.php" class="nav-link">Registrar Eventos</a></li>
                        <li class="navbar-nav mr-auto "><a href="buscador/index.php" class="nav-link">Registra Asistencia</a></li>
                        <li class="navbar-nav mr-auto "><a href="buscador/asistentes.php" class="nav-link">Listar Asistencia</a></li>
                        </ul>
                    </li>
                </ul>
                
                <span class="navbar-text">
                Bienvenido <?php echo $_SESSION['User']; ?>
                </span>
                <span class="navbar-text">
                <a href="cerrar.php" class="nav-link">Cerrar Sesión</a>
                </span>
            </div>
        </nav>
    </div>