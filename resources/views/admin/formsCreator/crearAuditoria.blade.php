<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-claro-success fw-bold modal-button-left" data-toggle="modal" data-target="#exampleModalTwo">
Generar Auditoria
</button>

<!-- Modal -->
<div class="modal hidden fixed top-0 left-0 w-full h-full outline-none fade" id="exampleModalTwo" tabindex="-1" role="dialog">
  <div class="modal-dialog relative w-auto pointer-events-none max-w-lg my-8 mx-auto px-4 sm:px-0" role="document">
    <div class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 rounded-lg">
      <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
        <h5 class="mb-0 text-lg leading-normal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="relative flex p-4">
<form action="{{url('/admin/auditoria')}}" method="post">
    @csrf
    <div class="mt-4 text-center">Registro de equipos</div>

    <div class="mt-8 flex flex-col">
    @error('au_maquina')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
      <label for="text" value="{{ __('au_maquina') }}">Maquina</label>
         <input id="au_maquina" class="block mt-1 w-full" type="text" name="au_maquina" :value="old('au_maquina')"  autofocus>
    </div>
       @error('au_so')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
     <div class="mt-8 flex flex-col">
      <label for="text" value="{{ __('au_so') }}">Sistema Operativo</label>
       <input type="text"id="au_so" class="block mt-1 w-full" name="au_so" :value="old('au_so')"  autofocus>
     </div>
   @error('au_ip')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
                    <div class="mt-8 flex flex-col">
                        <label for="email" value="{{ __('au_ip') }}">I.P.</label>
                        <input id="au_ip" class="block mt-1 w-full" type="text" name="au_ip" :value="old('au_ip')"  autofocus>
                    </div>
   @error('au_navegador')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
                    <div class="mt-8 flex flex-col">
                        <label for="email" value="{{ __('au_navegador') }}">Navegador</label>
                        <input type="text"id="au_navegador" class="block mt-1 w-full" name="au_navegador" :value="old('au_navegador')"  autofocus>
                    </div>
   @error('au_fecha')
    <br>
    <small>{{$message}}</small>
    <br>
    @enderror
                    <div class="mt-8 flex flex-col">
                        <label for="email" value="{{ __('au_fecha') }}">Fecha</label>
                        <input type="date"id="au_fecha" class="block mt-1 w-full" name="au_fecha" :value="old('au_fecha')"  autofocus>
                    </div>
        <button>Registrar</button>
    </form>
      </div>
     
    </div>
  </div>
</div>