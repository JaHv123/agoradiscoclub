
<?php 
	$conn = mysqli_connect("localhost","root","","login_agora");

	$id=$_POST['id'];
	$sql="UPDATE Invitados set Estado = '1',horaLlegada=now()
	where id='$id'";

	//$params = array("Actualizado", 1);
    echo  $result=mysqli_query($conn,$sql);	

    //echo $filas_afectadas = mysqli_affected_rows($result);
 ?>