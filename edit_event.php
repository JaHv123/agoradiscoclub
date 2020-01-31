<?php
     session_start();

    require "connection.php";
    $nombre = '';
    $fechaEvento= '';
    $fechaCierre = '';
    $horaCierre = '';
 
     if(isset($_SESSION['role'])){
         if($_SESSION['role'] != 'Administrador'){
             header('Location:index.php');
         }
     }

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM evento WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre=$row['nombre'];
            $fechaEvento = $row['fechaEvento'];
            $fechaCierre = $row['fechaCierre'];
            $horaCierre = $row['horaCierre'];
        }
    }
      

        if (isset($_POST['update'])) {
            $id = $_GET['id'];
            $nombre=$_POST['nombre'];
            $fechaEvento = $_POST['fechaEvento'];
            $fechaEvento = $_POST['fechaCierre'];
            $horaCierre = $_POST['horaCierre'];
          
            $query = "UPDATE usuario set  nombre = '$nombre', fechaEvento = '$fechaEvento', fechaCierre = '$fechaCierre', horaCierre='$horaCierre' WHERE id=$id";
            mysqli_query($conn, $query);
            $_SESSION['message'] = 'Task Updated Successfully';
            $_SESSION['message_type'] = 'warning';
            header('Location: admin.php');
          }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Promotor</title>
</head>
<body>
  
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-white" href="admin.php">
                <img   src="imagenes/AGORA-DISCO-LOGO-01.png" height="40px">
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

    <div class="container p-8">
        <div class="row">
            <div class="col-md-4">
                
                <form action="edit_people.php?id=<?php echo $_GET['id'];?>" method = "POST">
                    <div class="card card-body">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fechaEvento" class="form-control" value="<?php echo $fechaEvento; ?>" placeholder="Fecha Evento" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fechaCierre" class="form-control" value="<?php echo $fechaCierre; ?>" placeholder="Fecha Cierre" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="horaCierre" class="form-control" value="<?php echo $horaCierre; ?>" placeholder="Hora de Cierre" autofocus>
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success " value="Actualizar " name="update" >
                    </div>
                </form>
                </div>
            </div>
        </div>



    </div>
    <script type="text/javascript" src="js.jquery.min.js"></script>
    <script type="text/javascript" src="js.bootstrap.min.js"></script>
    <script type="text/javascript" src="js.popper.min.js"></script>

</body>
</html>

