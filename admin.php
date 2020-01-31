<?php
    include("connection.php");
?>

<?php include("includes/header.php");

?>

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
                    <form action="save_people.php" method="POST">
                    <div class="form-group">
                            <label for="username">Nombre de usuario: </label>
                            <input type="text" name="username" class="form-control" placeholder="Nombre" autofocus required>
                        </div>
                        <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="Password" name="password" class="form-control" placeholder="Contraseña" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="role">Rol de Usuario:</label>
                            <input type="text" name="role" class="form-control" placeholder="Rol" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" value="Guardar " name="save_people" >
                        </div>                        
                    </form>
                </div>
            </div>

            <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                    </tr>

                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM usuario";
                    $result_people = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($result_people)){?>
                        <tr>
                            <td><?php echo $row['Username']  ?></td>
                            <td><?php echo $row['Role']  ?></td>
                            
                            <td>
                                <a href="edit_people.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                <i class="far fa-edit"></i>
                                </a>
                                <a href="delete_people.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            
            </table>
        </div>

        </div>
    </div>

    <?php include("includes/footer.php");?>
