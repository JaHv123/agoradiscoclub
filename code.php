<?php
    session_start();
    require_once "connection.php";

    $message = "";
    if(isset($_POST["btnLogin"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM usuario where Username = '$username' AND Password = '$password'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($row["Role"] == "Administrador"){
                    $_SESSION['Id'] = $row["id"];
                    $_SESSION['User'] = $row["Username"];
                    $_SESSION['role'] = $row["Role"];
                    header('Location:admin.php');
                }else{
                    $_SESSION['User'] = $row["Username"];
                    $_SESSION['role'] = $row["Role"];
                    $_SESSION['Id'] = $row["id"];
                    header('Location:user.php');
                }
            }
        }else{
            header('Location:index.php');
        }
    }

 

?>