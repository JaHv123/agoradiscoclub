<?php session_start();
    include ("connection.php");

    $iduser = $_SESSION['User'];

    $sql = "SELECT * FROM usuario WHERE Username='$iduser'";
    $resultado = $conn->query($sql);
    $row = $resultado->fetch_assoc();

    $id = $row['id'];


    if(isset($_POST['save_invited'])){
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $idEvento = $_POST['idEvento'];

        
        $query = "INSERT INTO invitados(dni,nombre,telefono,idEvento,idUsuario,Estado) VALUES ('$dni','$nombre', '$telefono','$idEvento','$id',0)";
        $result = mysqli_query($conn, $query);
    
        if(!$result){
            die("Fallo de conexión");
        }

        $_SESSION['message'] = "Persona registrada";
        $_SESSION['message_type'] = "registrado";

        header ("Location:add_invited.php");
    }
?>