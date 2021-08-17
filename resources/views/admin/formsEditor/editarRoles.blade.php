<button class="btn btn-success btn-claro-success fw-bold editBtn"  data-bs-toggle="modal" >Edicion</button>  


<div class="modal fade" id="UserEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-rad">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="staticBackdropLabel">EDICION DE USUARIO</h5>
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
                            <select class="form-select " name="usuarios_us_id" required>
									<option value="">Seleccione usuario
									</option>
									@foreach($users as $key)
									<option value="{{$key->id}}">{{$key->user}}
									</option>
									@endforeach
								</select>
                            </div>
                    </div>
                </div>
                <div class="row row-quit-bs mx-4 mb-4">
                    <div class="col-4">
                        <button type="button" class="btn btn-outline-success w-100 modal-button-rigth fw-bold" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                    </div>
                    <div class="col-8">
                        <button type="submit" class="btn btn-success  w-100 modal-button-left ms-2 fw-bold"><span class="fas fa-save alt mx-2"></span>Editar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>