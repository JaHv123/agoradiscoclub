<?php
    include "code.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 

    <title>Login Ágora</title>
</head>
<body>
    
    <div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first">
        <img src="imagenes/AGORA-DISCO-LOGO-01.png" id="icon" alt="User Icon" />
        </div>
        <form action="code.php" method="POST">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Nombre de Usuario">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
        <input type="submit" class="fadeIn fourth" value="Iniciar Sesión" name="btnLogin">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
        <a class="underlineHover" href="registrar.php">Registrar Usuario</a>
        </div>

    </div>
    </div>
    <script type="text/javascript" src="js.jquery.min.js"></script>
    <script type="text/javascript" src="js.bootstrap.min.js"></script>
    <script type="text/javascript" src="js.popper.min.js"></script>

    
</body>
</html>