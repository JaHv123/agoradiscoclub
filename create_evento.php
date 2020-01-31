<?php include("connection.php");?>
<?php include("includes/header.php");?>

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
                    <form action="save_event.php" method="POST">
                    <div class="form-group">
                            <label for="nombre">Nombre del Evento</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
                        </div>
                        <div class="form-group">
                        <label for="fechaEvento">Fecha de Evento</label>
                        <input type="date" name="fechaEvento" class="form-control" placeholder="Fecha Evento" autofocus required>
                        </div>
                        <div class="form-group">
                        <label for="fechaCierre">Cierre de Evento</label>
                        <input type="date" name="fechaCierre" class="form-control" placeholder="Fecha Evento" autofocus required>
                        </div>
                        <div class="form-group">
                        <label for="horaCierre">Hora de cierre</label>
                        <input type="time" name="horaCierre" class="form-control" placeholder="Hora de Cierre" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" value="Guardar " name="save_event" >
                        </div>                        
                    </form>
                </div>
            </div>

            <div class="col-md-8">
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
                    $query = "SELECT * FROM evento";
                    $result_people = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($result_people)){?>
                        <tr>
                            <td><?php echo $row['nombre']  ?></td>
                            <td><?php echo $row['fechaEvento']  ?></td>
                            <td><?php echo $row['fechaCierre']  ?></td>
                            <td><?php echo $row['horaCierre']  ?></td>
                            
                            <td>
                                <a href="edit_event.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                <i class="far fa-edit"></i>
                                </a>
                                <a href="delete_event.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
