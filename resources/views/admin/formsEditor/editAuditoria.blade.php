<button type="button" class="bg-yellow-200" data-toggle="modal" data-target="#editAuditoria{{$key->id}}">
  actualizar
</button>

<!-- Modal -->
<div class="modal fade" id="editAuditoria{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Auditoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{Route('auditoria.update',$key->id)}}">
                        {{ csrf_field() }}
                          {{ method_field('PATCH') }}
                                    <div class="form-row">
                        <div class="form-group col-md-6">
                       <input type="text" class="form-control" placeholder="E-Salida" aria-label="au_maquina" aria-describedby="basic-addon1" required name="au_maquina" value="{{$key->au_maquina}}">
                        </div>
                        <div class="form-group col-md-6">
                          <input type="text" class="form-control" placeholder="fecha de salida" aria-label="au_so" aria-describedby="basic-addon2" required name="au_so" value="{{$key->au_so}}">
                        </div>
                      </div>

                                     <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="fecha de salida" aria-label="au_ip" aria-describedby="basic-addon2" required name="au_ip" value="{{$key->au_ip}}">
                        </div>
                            <br>
                        <div class="form-row">

                    </div>
                    <br>
                    <br>
                        <div class="form-group col-md-12">
        <input type="text" class="form-control" placeholder="" aria-label="au_navegador" aria-describedby="basic-addon4" required  name="au_navegador"  value="{{$key->au_navegador}}">
                        </div>
                      <br>
                    <br>
                        <div class="form-group col-md-12">
        <input type="date" class="form-control" placeholder="" aria-label="au_fecha" aria-describedby="basic-addon4" required  name="au_fecha"  value="{{$key->au_fecha}}">
                        </div>
                    </div>    
      </div>
      <div class="modal-footer">
 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
      </div>
    </div>
  </div>
</div>