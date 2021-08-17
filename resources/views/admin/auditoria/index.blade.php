@extends('layouts.menu')
@section('content')
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" >
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  
</head>
<div class="m-4">
  <div class="row">
    <div class="col-4 col-xs-12">
      <i class="fas fa-desktop fa-2x marco-icono p-3" data-fa-transform="shrink-8"></i>
    </div>
    <div class="col-4 col-xs-12">
      <hgroup class="text-center">
        <h1 class="fw-bold">Auditorias</h1>
        <h2 class="fw-normal h5 text-muted">Lista de equipos auditados</h2>
      </hgroup>    
    </div>
    <div class="col-4 col-xs-12">
      <div class="d-grid gap-2 d-md-flex d-xs-flex d-sm-flex justify-content-md-end">
       <a href="{{url('/dashboard')}}" class="btn btn-primary btn-claro fw-bold modal-button-rigth">
          <i class="fas fa-backward mx-2"></i>
          <label class="texto-button">Volver</label>
        </a>
        @include('admin.formsCreator.crearAuditoria')
      </div>
    </div>
  </div>
 
  </div>
  <div class="text-center table-responsive">
    <table class="table table-striped table-hover" id="equiposTable">
      <thead>
        <tr class="bg-dark text-white">
          <th scope="col">N°</th>
          <th scope="col">Maquina</th>
          <th scope="col">Sistema Operativo</th>
          <th scope="col">IP</th>
          <th scope="col">Navegador</th>
          <th scope="col">Fecha</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
    <tr>
    @if(!empty($auditorias) && $auditorias->count())
        @foreach($auditorias as $key)
      <td class="border border-gray-400 px-4 py-2 text-gray-800">{{$key->au_maquina}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800">{{$key->au_so}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800">{{$key->au_ip}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800">{{$key->au_navegador}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800">{{$key->au_fecha}}</td>
            <td class="border border-gray-400 px-4 py-2 text-gray-800">@include('admin.forms.editAuditoria')</td>
    </tr>
    @endforeach
    @endif
  </tbody>
    </table>
  </div>
</div>

@endsection
