<?php 
	
	$conn = mysqli_connect("localhost","root","","login_agora");

	$sql="SELECT id,nombre from evento";
				$result=mysqli_query($conn,$sql);

 ?>
<br><br>
<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label>Buscador</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona Evento</option>
			<?php
				while($ver=mysqli_fetch_array($result)): 
			 ?>
				<option value="<?php echo $ver[0] ?>">
					<?php echo ($ver[1])?>
				</option>

			<?php endwhile; ?>

		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'php/crearsession.php',
					success:function(r){
						$('#tabla').load('asistentes/tabla.php');
					}
				});
			});
		});
	</script>