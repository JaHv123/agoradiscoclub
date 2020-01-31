<?php
    include ("connection.php");

    if(isset($_POST['save_people'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        $query = "INSERT INTO usuario(Username,Password,Role) VALUES ('$username','$password','$role')";
        $result = mysqli_query($conn, $query);

    
        if(!$result){
            die("Fallo de conexión");
        }

        $_SESSION['message'] = "Persona registrada";
        $_SESSION['message_type'] = "registrado";

        header ("Location:admin.php");
    }
?>