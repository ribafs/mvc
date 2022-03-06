$(document).on('click', '#btnMostrar', function(event) {
	$.ajax({
		url: 'index.php',
		type: 'POST',
		data: {c:'inicio',a:'mostrarArreglo'},
	})
	.done(function(res) {
		//console.log(res);
		datos = $.parseJSON(res);
		var lista = '<select class="form-control col-2">';
		$.each(datos, function(index, val) {
			//console.log(index);
			//console.log(val);
			lista += '<option value="'+index+'">'+val+'</option>';
		});
		lista += '</select>';
		$('#lista').html(lista);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
});

$(document).on('submit', '.fAjax', function(e) {
	//Evita recargar la pagina
	e.preventDefault();
	
	$.ajax({
		url: 'index.php',
		type: $(this).data('metodo'),
		data: $(this).serialize()
			/*{
			c:'cliente',a:'store',
			   nombre:$('input[name="nombre"]').val(),
			   apellido:$('input[name="apellido"]').val(),
			   tipodocumento:$('select[name="tipodocumento"]').val(),
			   documento:$('input[name="documento"]').val(),
			},*/
	})
	.done(function(res) {
		console.log(res);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});


});