
/*Ajax para la edicion y creacion de equipos*/


$(document).ready(function() {

    //Comunicacion con el formulario
    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        //Ajax con la informacion para crear
        $.ajax({
            type: "POST",
            url: "/equiposAdd",
            data: $('#addForm').serialize(),
            success: function(response) {
                console.log(response)
                $('#equipoModal').modal('hide')
                alert('Data Saved');
                location.reload();
            },
            error: function(error) {
                console.log(error)
                alert('Data Not Saved');
            }
        });
    });
});
//Edicion del equipo
$(document).ready(function() {
	$('.editBtn').on('click', function() {
		$('#editEquipo').modal('show');

		//Recibir el value 
		$tr = $(this).closest('tr');

		var data = $tr.children("td").map(function() {
			return $(this).text();
		}).get();

			console.log(data);
		//validacion de data desde el ID
		$('#id').val(data[0]);
		$('#eq_modelo').val(data[1]);
		$('#eq_marca').val(data[2]);
		$('#eq_serial').val(data[3]);
		$('#eq_nbiennacional').val(data[4]);
        $('#eq_estatus').val(data[5]);
		$('#eq_tequid').val(data[6]);
        $('#departamentos_dep_id').val(data[7]);
				//Comunicacion con el formulario
		$('#editFormID').on('submit', function(e) {
			e.preventDefault();

			var id = $('#id').val();
			//Ajax con la informacion para crear
			$.ajax({
				type: "PUT",
				url: "/equiposUpdate/"+id,
				data: $('#editFormID').serialize(),
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
});

//Eliminacion del equipo (Funcion de prueba)

$(document).ready(function() {
	$('.deleteBtn').on('click', function() {
		$('#equipoDelete').modal('show');

		//Recibir el value 
		$tr = $(this).closest('tr');

		var data = $tr.children("td").map(function() {
			return $(this).text();
		}).get();

			console.log(data);
		//validacion de data desde el ID
		$('#delete_id').val(data[0]);

				//Comunicacion con el formulario
		$('#deleteFormID').on('submit', function(e) {
			e.preventDefault();

			var id = $('#delete_id').val();
			//Ajax con la informacion para crear
			$.ajax({
				type: "DELETE",
				url: "/equiposDelete/"+id,
				data: $('#deleteFormID').serialize(),
				success: function(response) {
					console.log(response)
					$('#equipoDelete').modal('hide')
					alert('Data Eliminated');
					//Recarga asincronica AJAX
					window.location.reload();
				},
				error: function(error) {
					console.log(error)
					alert('Data Not Eliminated');
				}
			});
		});
 
	});
});