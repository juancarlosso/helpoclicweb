@extends('layouts.app')

@section('titulo')
Tipo Establecimientos
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('tipo_establecimientos.index')}}">Tipo Establecimientos</a></li>
        <li class="breadcrumb-item"><a href="#">Nuevo</a></li>
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos del nuevo Tipo de Establecimientos</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('tipo_establecimientos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class=" row mb-4">
                <label for="nombre" class="col-md-3 form-label">Nombre</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="telefono" class="col-md-3 form-label">Activo</label>
                <div class="col-md-9">
                    <select class="form-control select2" id='activo' name='activo'>
                        <option value="0" selected>INACTIVO</option>
                        <option value="1" selected>ACTIVO</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row mb-4">
                <label for="imagen" class="col-md-3 form-label">Imagen</label>
                <div class="col-md-9">
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
            </div>
            

            <div class="mb-0 mt-4 row justify-content-end">
                <div class="col-md-12">
                    <a href="{{route('tipo_establecimientos.index')}}" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
                    <button class="btn btn-success pull-right"><i class="fa fa-check"></i> Aceptar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
  <script>
  $(".select2").select2();
  </script>
@endsection
