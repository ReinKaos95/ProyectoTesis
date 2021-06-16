
<button type="button" class="bg-blue-400 rounded-md" data-toggle="modal" data-target="#verPrestamo{{$key->id}}">
  Informacion
</button>


    <div class="modal fade" id="verPrestamo{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Informacion Completa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <div class="modal-body">
         <p>Codigo de Prestamo: {{$key->eq_modelo}}</p>
          <p>Fecha de Salida: {{$key->eq_marca}}</p>
          <p>Fecha de Entrada: {{$key->eq_nbiennacional}}</p>
          <p>Codigo de Prestamo: {{$key->eq_tequid}}</p>
          <p>Fecha de Salida: {{$key->departamentos_dep_id}}</p>
          <p>Estado: {{$key->eq_estatus}}</p>

          
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{url('admin/pdf/invoice')}}"align="center" class=
          "btn btn-primary">Imprimir comprobante</a>
         </div>
   </form>
    </div>
  </div>
</div>