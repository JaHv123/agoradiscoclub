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

    $iduser = $_SESSION['User'];

    $sql = "SELECT * FROM usuario WHERE Username='$iduser'";
    $resultado = $conn->query($sql);
    $row = $resultado->fetch_assoc();

    $idx = $row['id'];
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
            <div class="col-md-4">
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="save_invited.php" method="POST" class="formulario">
                        <div class="form-group">
                            <label for="idEvento">Evento</label>
                            <select name="idEvento" class="form-control">
                            <?php 
                                $msql = "SELECT id, nombre FROM evento WHERE fechaCierre>Now()";
                                $res = mysqli_query($conn,$msql);
                                while($row = mysqli_fetch_array($res)){
                                    $nombre = utf8_encode($row[1]);
                                    $id = $row[0];
                                    echo "<option value='$id'> $row[1]</option>";    
                                    
                                    } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="dni" class="form-control" placeholder="DNI" autofocus required>
                        </div>
                        <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" class="form-control" placeholder="Telefono" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" value="Guardar " name="save_invited" >
                        </div>                        
                    </form>
                </div>
            </div>

            <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                        
                    </tr>

                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM invitados INNER JOIN usuario ON invitados.idUsuario=usuario.id WHERE usuario.id='$idx'";
                    $result_people = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($result_people)){?>
                        <tr>
                            <td><?php echo $row['dni']  ?></td>
                            <td><?php echo $row['nombre']  ?></td>
                            <td><?php echo $row['telefono']  ?></td>
                            
                            <td>
                                <a href="edit_people.php?id=<?php echo $idx?>" class="btn btn-primary"  >
                                <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            
            </table>
        </div>

        </div>
    </div>
  

</body>
</html>