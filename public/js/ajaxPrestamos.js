
/*Ajax para la creacion, edicion y eliminacion de prestamos*/


$(document).ready(function() {

    //Comunicacion con el formulario
    $('#prestamoFrm').on('submit', function(e) {
        e.preventDefault();
        //Ajax con la informacion para crear
        $.ajax({
            type: "POST",
            url: "/prestamosAdd",
            data: $('#prestamoFrm').serialize(),
            success: function(response) {
                console.log(response)
                $('#equipoprestamoModalModal').modal('hide')
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
		$('#editPrestamo').modal('show');

		//Recibir el value 
		$tr = $(this).closest('tr');

		var data = $tr.children("td").map(function() {
			return $(this).text();
		}).get();

			console.log(data);
		//validacion de data desde el ID
		$('#id').val(data[0]);
		$('#pres_salida').val(data[1]);
		$('#pres_fecha_salida').val(data[2]);
		$('#pres_fecha_entrada').val(data[3]);
		$('#pres_estatus').val(data[4]);

				//Comunicacion con el formulario
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
});

//Eliminacion del equipo (Funcion de prueba)

$(document).ready(function() {
	$('.deleteBtn').on('click', function() {
		$('#prestamoDelete').modal('show');

		//Recibir el value 
		$tr = $(this).closest('tr');

		var data = $tr.children("td").map(function() {
			return $(this).text();
		}).get();

			console.log(data);
		//validacion de data desde el ID
		$('#delete_id').val(data[0]);

				//Comunicacion con el formulario
		$('#prestamoDeleteID').on('submit', function(e) {
			e.preventDefault();

			var id = $('#delete_id').val();
			//Ajax con la informacion para crear
			$.ajax({
				type: "DELETE",
				url: "/prestamosDelete/"+id,
				data: $('#prestamoDeleteID').serialize(),
				success: function(response) {
					console.log(response)
					$('#prestamoDelete').modal('hide')
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