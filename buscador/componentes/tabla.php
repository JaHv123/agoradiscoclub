
<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","login_agora");


 ?>

<div class="row">
	<div class="col-sm-12">
	<h2>Lista de Invitados por evento</h2>
		<table class="table table-hover table-condensed table-bordered">
		
			<tr>
		
											<th data-class="expand">Dni / Nombre</th>
										
											<th data-hide="phone">Asistencia</th>
											
			</tr>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT i.id, CONCAT(i.dni, ' ', i.nombre) AS PERSON,i.estado,I.id from evento e join invitados i on e.id=i.idEvento WHERE E.id='$idp' ";
					}else{
						$sql="SELECT E.id, CONCAT(i.dni, ' ', i.nombre) AS PERSON,i.Estado
						from evento e  join invitados i on e.id=i.idEvento";
					}
				}else{
					$sql="SELECT i.id, CONCAT(i.dni, ' ', i.nombre) AS PERSON,i.Estado,I.idEvento from evento e join invitados i on e.id=i.idEvento";
				}

				$result=mysqli_query($conn,$sql);
				while($ver=mysqli_fetch_array($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2];
			 ?>

			<tr>
				<td><?php echo $ver[1] ?></td>
			
				<td>
					<?php if ($ver[2]==1) {?>
					
						<button class="btn btn-success glyphicon glyphicon-check" 
						
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
					<i class="fas fa-user-check"></i>
					<?php } else{ ?>
					
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
					<i class="fas fa-user-check"></i>
					</button>
					<?php } ?>
					
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>