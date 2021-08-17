
<div class="modal fade" id="editEquipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content border-rad">
			<div class="modal-header">
				<h5 class="modal-title fw-bold" id="staticBackdropLabel">EDITAR EQUIPO</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="editFrmID">
				<div class="modal-body p-4 text-center" >
					@csrf
					@method('PUT')
					<input type="hidden" name="id" id="id">
					<div class="container">
						<div class="row row cols-2">
							<div class="col-6 my-2">
								<label  class="fw-normal">Modelo</label>
								<input type="text" class="form-control" name="eq_modelo" placeholder="Modelo" id="modelos_mdl_id">
							</div>
							<div class="col-6 my-2">
								<label  class="fw-normal">Marca</label>
								<input type="text" class="form-control" name="eq_marca" placeholder="Marca" id="marcas_mar_id">
							</div>
							<div class="col-6 mt-2">
								<label class="fw-normal">Tipo de equipo</label>
								<select class="form-select" name="eq_tequid" id="eq_tequid">
								<option value="">Seleccione Equipo
									</option>
									@foreach($tipoEquipo as $key => $value)
									<option value="{{$key}}">{{$value}}
									</option>
									@endforeach
								</select>
							</div>
							<div class="col-6 mt-2">
								<label class="fw-normal">Serial</label>
								<input type="text" class="form-control" name="eq_serial" placeholder="Serial" id="eq_serial">
							</div>
							<div class="col-6 mt-2">
								<label class="fw-normal">N°. Bien Nacional</label>
								<input type="text" class="form-control" name="eq_nbiennacional" placeholder="N° Bien Nacional" id="eq_nbiennacional">
							</div>
							<div class="col-6 mt-2">
								<label class="fw-normal">Departamento</label>
								<select  class="form-select" name="departamentos_dep_id" id="departamentos_dep_id">
									
								<option value="">Seleccione Departamento
									</option>
									@foreach($departamentos as $key => $value)
									<option value="{{$key}}">{{$value}}
									</option>
									@endforeach
								</select>
							</div>
							<div class="col-12 mt-2">
								<label class="fw-normal">Estado</label>
								<input type="text" class="form-control" name="eq_estatus" placeholder="N° Estado" id="eq_estatus">
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

