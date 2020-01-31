<?php
    session_start();
    require "connection.php";

    if(isset($_SESSION['role'])){
        if($_SESSION['role'] == 'Promotor' && $_SESSION['role'] == 'Administrador'){
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Promotor</title>
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
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="user.php" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-item active">
                        <a href="buscador/invitados.php" class="nav-link">Invitados</a>
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

    

    <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Evento</th>
                        <th>Fecha Evento</th>
                        <th>Cierre Evento</th>
                        <th>Hora de cierre</th>
                        <th>Opciones</th>
                        
                    </tr>

                </thead>
                <tbody>
                    <?php 
                    $time = date("Y-m-d H:i:s");

                    $query = "SELECT CONCAT(fechaCierre,' ', horaCierre) AS Cierre, nombre,fechaEvento,fechaCierre, horaCierre FROM `evento` ";
                    $result_people = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($result_people)){?>
                        <tr>
                            <td><?php echo $row['nombre']  ?></td>
                            <td><?php echo $row['fechaEvento']  ?></td>
                            <td><?php echo $row['fechaCierre']  ?></td>
                            <td><?php echo $row['horaCierre']  ?></td>
                            <td>
                            <?php 
                                if($time >= $row['0']){?>
                                    <button disabled class="btn btn-warning " href="add_invited.php?id=<?php echo $row['id']?>">
                            <i class="fas fa-plus"></i>
                            </button
                                <?php } else{?>
                                    <a href="add_invited.php?id=<?php echo $row['id']?>" class="btn btn-warning">
                                    <i class="fas fa-plus"></i>
                                    </a>
                                <?php } ?>
                               
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            
            </table>
        </div>

        </div>
    </div>
  

    <script type="text/javascript" src="js.bootstrap.min.js"></script>
    <script type="text/javascript" src="js.popper.min.js"></script>
    

</body>
</html>