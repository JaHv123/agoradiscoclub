<?php
    session_start();

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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> 
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
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Promotores</a>
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
    <script type="text/javascript" src="js.jquery.min.js"></script>
    <script type="text/javascript" src="js.bootstrap.min.js"></script>
    <script type="text/javascript" src="js.popper.min.js"></script>

</body>
</html>