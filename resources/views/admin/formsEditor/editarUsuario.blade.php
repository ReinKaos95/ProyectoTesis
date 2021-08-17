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
                                @error('nombre')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="nombre" value="{{ __('nombre') }}">Nombre</label>
                                <input id="nombreModalUserEdit" placeholder="Nombre" class="form-control" type="text" name="nombre" :value="old('nombre')" required autocomplete="name">
                            </div>
                            <div class="col-6 my-2">
                                @error('apellido')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="apellido" value="{{ __('apellido') }}">Apellido</label>
                                <input id="apellidoModalUserEdit" placeholder="Apellido" class="form-control" type="text" name="apellido" :value="old('apellido')" required autocomplete="apellido">
                            </div>
                            <div class="col-6 mt-2">
                                @error('cedula')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="cedula" value="{{ __('cedula') }}">Cédula</label>
                                <input id="cedulaModalUserEdit" placeholder="No. Cédula" class="form-control" type="number" name="cedula" :value="old('cedula')" required />
                            </div>
                            <div class="col-6 mt-2">
                                @error('email')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="email" value="{{ __('Email') }}">Email</label>
                                <input id="emailModalUserEdit" placeholder="Correo" class="form-control" type="email" name="email" :value="old('email')" required />
                            </div>
                            <div class="col-6 mt-2">
                                @error('usuario')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="usuario" value="{{ __('usuario') }}">Nombre de Usuario</label>
                                <input id="usuarioModalUserEdit" placeholder="Nombre de Usuario" class="form-control" type="text" name="usuario" :value="old('usuario')" required />

                                <div class="col-12 mt-2">
                                    <label class="fw-normal" for="text" value="{{ __('estatus') }}">Estado</label>
                                    <fieldset>
                                    <input id="estatusModalUserEdit" placeholder="estatus" class="form-control" type="text" name="estatus" :value="old('estatus')" required autocomplete="name">
                                    </fieldset>
                                </div>
                            </div>
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