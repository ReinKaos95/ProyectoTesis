
<div class="modal fade" id="editPrestamo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content border-rad">
			<div class="modal-header">
				<h5 class="modal-title fw-bold" id="staticBackdropLabel">EDITAR PRESTAMO</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="prestamoEdit">
				<div class="modal-body p-4 text-center" >
					@csrf
					@method('PUT')
					<input type="hidden" name="id" id="id">
<div class="container">
						<div class="row row cols-2">
							<div class="col-6 my-2">
								@error('pres_salida')
								<br>
								<small>{{$message}}</small>
								<br>
								@enderror
								<label for="pres_salida" class="fw-normal" value="{{ __('pres_salida') }}">Código de Salida</label>
								<input id="pres_salida" placeholder="Código de Salida" class="form-control" type="text" name="pres_salida" :value="old('pres_salida')" autofocus required>
							</div>
							<div class="col-6 my-2">
								@error('pres_fecha_salida')
								<br>
								<small>{{$message}}</small>
								<br>
								@enderror
								<label for="pres_fecha_entrada" value="{{ __('pres_fecha_salida') }}" class="fw-normal">Fecha de Salida</label>
								<input type="date" id="pres_fecha_salida" class="form-control" name="pres_fecha_salida" :value="old('pres_fecha_salida')" autofocus required>
							</div>
							<div class="col-6 mt-2">
								<label class="fw-normal">Usuario a Prestar</label>
								<select class="form-select " name="usuarios_us_id" required>
									<option value="">Seleccione usuario
									</option>
									@foreach($users as $key => $value)
									<option value="{{$value->id}}">{{$value->usuario}}
									</option>
									@endforeach
								</select>
							</div>
							<div class="col-6 mt-2">
								<label class="fw-normal" value="{{ __('equipos_eq_id') }}">Equipo a Prestar</label>
								<select class="form-select" name="equipos_eq_id" required>
									<option value="">Seleccione Equipo
									</option>
									@foreach($id as $key => $value)
									<option value="{{$value}}">{{$value}}
									</option>
									@endforeach
								</select>
							</div>
							<div class="col-6 mt-2">
								@error('pres_fecha_entrada')
								<br>
								<small>{{$message}}</small>
								<br>
								@enderror
								<label for="pres_fecha_entrada" class="fw-normal" value="{{ __('pres_fecha_entrada') }}">Fecha de Entrada</label>
								<input id="pres_fecha_entrada" class="form-control" type="date" name="pres_fecha_entrada" :value="old('pres_fecha_entrada')"  autofocus required>
							</div>
						
						</div>
					</div>
				</div>
				<div class="row row-quit-bs mx-4 mb-4">
					<div class="col-4">
						<button type="button" class="btn btn-outline-success w-100 modal-button-rigth fw-bold" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
					</div>
					<div class="col-8">
						<button type="submit" class="btn btn-success  w-100 modal-button-left ms-2 fw-bold"><span class="fas fa-save alt mx-2"></span>Guardar Cambios</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

