function validar() {
	$(document).ready(function() {	
		if($("#local") == $("#visitante")) {
			$("submit").setAttribute("disabled", "false");
		}
	});
}