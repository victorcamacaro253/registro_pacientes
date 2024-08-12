function mostrarDatos(){
	$.ajax({
		url:"mostrarDatos.php",
		success:function(r){
			$('#tablaDatos').html(r);

		}
	})
}


function agregardatos(){
	
	if($('#nombre').val()==""){
		swal("debes agregar un nombre");
		return false;
	}

        $.ajax({
    	type:"POST",
    	data:$('#frmagregardatos').serialize(),
    	url:"agregardatos.php",
    	success:function(r){
    		
    		
    			$('#frmagregardatos')[0].reset();
    			mostrarDatos();
    			swal("agregado con exito");
    		
    		

          //$('#frmagregardatos')[0].reset();
           
          //$('#frmagregardatos').load('#modalinsertar');
          //mostrardatos();
          //swal("agregado con exito");
      

    	}
    });

}








function agregadatosparaedicion(id){

	$.ajax({
		type:"POST",
		data:"id=" + id,
		url:"datosupdate.php",
		success:function(r){
        datos=jQuery.parseJSON(r);

        $('#idu').val(datos['id_paciente']);
        $('#nombreu').val(datos['primer_nombre']);
		$('#2nombreu').val(datos['segundo_nombre']);
		$('#apellido1').val(datos['primer_apellido']);
        $('#apellido2').val(datos['segundo_apellido']);
		$('#cedulau').val(datos['cedula']);
		$('#generou').val(datos['genero']);
        $('#direccionu').val(datos['direccion']);
        $('#telefonou').val(datos['telefono']);
		}
	});
}


function actualizardatos(){
	if ($('#nombreu').val()==""){
		swal("debes agregar un nombre");
		return false;
	} 
	$.ajax({
		type:"POST",
		data:$('#frmagregardatosu').serialize(),
		url:"actualizardatos.php",
		success:function(r){
			if (r==1) {
				
				mostrarDatos();
				swal("actualizado con exito","success");

			}else{
				swal("fallo al actualizar","error");
			}
		}
	});

}



function eliminardatos(idnombre){



		     $.ajax({
				type:"POST",
				data:"id=" + idnombre,
				url:"eliminardatos.php",
				success:function(r){
					if(r==1){
						mostrarDatos();
						swal("eliminado con exito","success");

					}else{
						swal("fallo al eliminar");
					}
				}

			});
		}


		function mostrarDatosHistorial(){
			$.ajax({
				url:"mostrarDatosHistorial.php",
				success:function(r){
					$('#tablaDatosHistorial').html(r);
		
				}
			})
		}
		
		