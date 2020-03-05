function eliminar(id) {
	swal({
		  title: "¿Estás seguro?",
		  text: "No habrá vuelta atrás",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((OK) => {
		  if (OK) {
			  $.ajax({
				  url:"/eliminar/"+id
			  });
		    swal("El partido ha sido eliminado", {
		      icon: "success",
		    }).then((ok)=>{
		    	if (ok) {
		    		location.href="/partidos";
		    	}
		    });
		  }
		});

}