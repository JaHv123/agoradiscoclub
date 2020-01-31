
<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","login_agora");

	$iduser = $_SESSION['User'];

	$sql = "SELECT * FROM usuario WHERE Username='$iduser'";
	$resultado = $conn->query($sql);
	$row = $resultado->fetch_assoc();
  
	$idx = $row['id'];


 ?>

<div class="row">
	<div class="col-sm-12">
	<h2>Lista de Invitados por evento</h2>
		<table class="table table-hover table-condensed table-bordered">
		
			<tr>
		
				<th data-class="expand">Invitado</th>
				<th data-hide="phone">Hora de Llegada</th>
				<th data-hide="phone">Evento</th>
				<th data-hide="phone">Promotor</th>
			</tr>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT i.id, i.dni, i.nombre, i.horaLlegada,e.nombre,u.Username , i.estado
						FROM invitados i JOIN evento e ON i.idEvento=e.id JOIN usuario u ON i.idUsuario=u.id 
						WHERE e.id='$idp'";
					}else{
						$sql="SELECT i.id, i.dni, i.nombre, i.horaLlegada,e.nombre,u.Username, i.estado
						FROM invitados i JOIN evento e ON i.idEvento=e.id JOIN usuario u ON i.idUsuario=u.id
						where u.id='$idx' ";
					}
				}else{
					$sql="SELECT i.id, i.dni, i.nombre, i.horaLlegada,e.nombre,u.Username, i.estado
					FROM invitados i JOIN evento e ON i.idEvento=e.id JOIN usuario u ON i.idUsuario=u.id
					where u.id='$idx' ";
				}

				$result=mysqli_query($conn,$sql);
				while($ver=mysqli_fetch_array($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5]."||".
						   $ver[6];
			 ?>

			<tr>
				<td><?php echo $ver[1].' '.$ver[2]; ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td><?php echo $ver[5] ?></td>

				<td>
					<?php if ($ver[6]==1) {?>
						<span style = "color:#4CAF50" >Asistió</span>				
					
					<?php } else{ ?>
					
						<span style="color:#FF0000">No Asistió</span>				
					<?php } ?>
					
				</td>
				
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>