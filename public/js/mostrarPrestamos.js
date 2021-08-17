/*
var obtener_data = function(tbody, table){
	$(tbody).on('click', 'button.editBtn', function(){
		var data = table.row($(this).parents('tr')).data();
		//console.log(data);
		var id =$('#id').val(data.id),
		pres_salida =$('#pres_salida').val(data.pres_salida),
		pres_fecha_salida =$('#pres_fecha_salida').val(data.pres_fecha_salida),
		pres_fecha_entrada =$('#pres_fecha_entrada').val(data.pres_fecha_entrada),
		usuarios_us_id =$('#usuarios_us_id').val(data.usuarios_us_id),
		equipos_eq_id =$('#equipos_eq_id').val(data.equipos_eq_id),
		pres_estatus =$('#pres_estatus').val(data.pres_estatus);
	});
}

$(document).ready( function () {
    table = $('#prestamosTable').DataTable({
      "serverSide":true,
		  "ajax": '/list_prestamos',
		  "columns":[
			  {data:"id"},
			  {data:"pres_salida"},
			  {data:"pres_fecha_salida"},
			  {data:"pres_fecha_entrada"},
			  {data:"usuarios_us_id"},
			  {data:"equipos_eq_id"},
        {data:"pres_estatus"},
		{defaultContent: "<button class='btn btn-success btn-claro-success fw-bold editBtn' data-bs-toggle='modal'>Editar</button>"}
		]
    });
	obtener_data("#prestamosTable tbody", table);
} );*/


//Mostrar equipos

$(document).ready( function () {
    table = $('#prestamosTable').DataTable({
      "serverSide":true,
		  "ajax": '/list_prestamos',
		  "columns":[
			  {data:"id"},
			  {data:"pres_salida"},
			  {data:"pres_fecha_salida"},
			  {data:"pres_fecha_entrada"},
			  {data:"usuarios_us_id"},
			  {data:"equipos_eq_id"},
        {data:"pres_estatus"},
		{defaultContent: "<button class='editBtn btn btn-success btn-claro-success fw-bold' data-bs-toggle='modal' data-bs-target='#editPrestamo'>Editar</button>"}
		]
    });
	obtener_data("#prestamosTable tbody", table);
} );


var obtener_data = function(tbody, table){
	$(tbody).on('click', 'button.editBtn', function(){
		var data = table.row($(this).parents('tr')).data();
		//console.log(data);
		var id =$('#id').val(data.id),
		pres_salida =$('#pres_salida').val(data.pres_salida),
		pres_fecha_salida =$('#pres_fecha_salida').val(data.pres_fecha_salida),
		pres_fecha_entrada =$('#pres_fecha_entrada').val(data.pres_fecha_entrada),
		usuarios_us_id =$('#usuarios_us_id').val(data.usuarios_us_id),
		equipos_eq_id =$('#equipos_eq_id').val(data.equipos_eq_id),
		pres_estatus =$('#pres_estatus').val(data.pres_estatus);

		$('#prestamoEdit').on('submit', function(e) {
			e.preventDefault();

			var id = $('#id').val();
			//Ajax con la informacion para crear
			$.ajax({
				type: "PUT",
				url: "/prestamosUpdate/"+id,
				data: $('#prestamoEdit').serialize(),
				success: function(response) {
					console.log(response)
					$('#editPrestamo').modal('hide')
					alert('Data Updated');
					//Recarga asincronica AJAX
					location.reload();
				},
				error: function(error) {
					console.log(error)
					alert('Data Not Updated');
				}
			});
		});

	});
}