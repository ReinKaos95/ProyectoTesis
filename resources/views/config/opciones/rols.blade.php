
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
  <div class="row">
    <div class="col-4 col-xs-12">
      <hgroup class="text-center row justify-center">
        <h1 class="fw-bold">Configuración de roles</h1>
        <h2 class="fw-normal h5 text-muted">Lista de Usuarios</h2>
      </hgroup>    
    </div>
    <div class="col-4 col-xs-12">
      <div class="d-grid gap-2 d-md-flex d-xs-flex d-sm-flex justify-content-md-end">

      </div>
    </div>
  </div>
<div class="text-center table-responsive">
	<table class="table" id="usersTable">
		<thead class="bg-dark text-white">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Usuario</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				@if(!empty($users) && $users->count())
				@foreach($users as $key)
				<td>{{$key->id}}</td>
				<td >{{$key->usuario}}</td>
				<td>@include('admin.formsEditor.editarRles')</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
</div>
<script src="{{ asset('js/ajax.js') }}"></script>
