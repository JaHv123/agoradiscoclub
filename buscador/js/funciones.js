

function preguntarSiNo(id){
	 asitencia(id);
}

function asitencia(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/EstadoAsistente.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Asistencia registrada!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}