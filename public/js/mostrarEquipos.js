
//Mostrar equipos
$(document).ready( function () {

   table = $("#equiposTable").DataTable(
			{
        // "language": {
        //   "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        // },
			"serverSide":true,
				"ajax": '/list_equipos',
				"columns":[
					{data:"id"},
					{data:"eq_serial"},
					{data:"tipo_equipos.teq_nombre"},
					{data:"eq_nbiennacional"},
					{data:"eq_estatus"},
					{data:"eq_marca"},
					{data:"eq_modelo"},
			  		{data:"departamentos.dep_nombre"},
					{"defaultContent": "<button class='btn btn-success btn-claro-success fw-bold editBtn' data-bs-toggle='modal' data-bs-target='#editEquipo'>Editar</button>"}
			  ]	
		  }

	);
	obtener_data("#equiposTable tbody", table);
} );

var obtener_data = function(tbody, table){
	$(tbody).on('click', 'button.editBtn', function(){
		var data = table.row($(this).parents('tr')).data();
		//console.log(data);
		var id =$('#id').val(data.id),
		eq_modelo =$('#eq_modelo').val(data.eq_modelo),
		eq_marca =$('#eq_marca').val(data.eq_marca),
			eq_tequid =$('#eq_tequid').val(data.eq_tequid),
			eq_serial =$('#eq_serial').val(data.eq_serial),
			eq_nbiennacional =$('#eq_nbiennacional').val(data.eq_nbiennacional),
			eq_estatus =$('#eq_estatus').val(data.eq_estatus),
			departamentos_dep_id =$('#departamentos_dep_id').val(data.departamentos_dep_id);

			$('#editFrmID').on('submit', function(e) {
				e.preventDefault();
	
				var id = $('#id').val();
				//Ajax con la informacion para crear
				$.ajax({
					type: "PUT",
					url: "/equiposUpdate/"+id,
					data: $('#editFrmID').serialize(),
					success: function(response) {
						console.log(response)
						$('#editEquipo').modal('hide')
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
/*
$("#marcas_mar_id").change(function(){
	$.ajax({
		url: "{{ route('admin.equipos.list_modelos') }}?modelos=" + $(this).val(),
		method: 'GET',
		success: function(data) {
			$('#modelos_mdl_id').html(data.html);
		}
	});
});*/

/*$(document).ready(function () {
	$('#marcas_mar_id').on('change', function () {
		var marca_mar_id = $(this).val();
		if ($.trim(marca_mar_id) != '') {
			$.get('list_modelos', {marca_mar_id: marca_mar_id}, function(modelos) {
				$('#modelos_mdl_id').empty();
				$('#modelos_mdl_id').append("<option value=''>Selecciona un modelo</option>");
				$.each(modelos, function (index, value) {
				$('#modelos_mdl_id').append("<option value='"+index+"'>"+value+"</option>");
				})
			});
		}
	});
});*/



//Mostrar equipos
/*$(document).ready(function () {
	 $('#marcas_mar_id').on('change', function () {
		 let id = $(this).val();
		 $('#modelos_mdl_id').empty();
		 $('#modelos_mdl_id').append("<option value='0' disabled>Selecciona un modelo</option>");
		 $.ajax({
			 type: 'GET',
			 url: 'list_modelos/' + id,
			 success: function (response) {
				 var response = JSON.parse(response);
				 console.log(response);
				 $('#modelos_mdl_id').empty();
				 $('#modelos_mdl_id').append("<option value='0' disabled>Selecciona un modelo</option>");
				 response.forEach(element =>{
				 $('#modelos_mdl_id').append(`<option value="${element['id']}">${element['mdl_nombre']}</option>`);
				 })
			 }
		 })
	 })
 })*/