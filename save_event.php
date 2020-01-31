<?php
    include ("connection.php");

    if(isset($_POST['save_event'])){
        $nombre = $_POST['nombre'];
        $fechaEvento = $_POST['fechaEvento'];
        $fechaCierre = $_POST['fechaCierre'];
        $horaCierre = $_POST['horaCierre'];
        
        $query = "INSERT INTO evento(nombre,fechaEvento, fechaCierre,horaCierre) VALUES ('$nombre','$fechaEvento', '$fechaCierre','$horaCierre')";
        $result = mysqli_query($conn, $query);
    
        if(!$result){
            die("Fallo de conexión");
        }

        $_SESSION['message'] = "Persona registrada";
        $_SESSION['message_type'] = "registrado";

        header ("Location:create_evento.php");
    }
?>