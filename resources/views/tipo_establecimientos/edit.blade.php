@extends('layouts.app')

@section('titulo')
Tipo Establecimientos
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('tipo_establecimientos.index')}}">Tipo Establecimientos</a></li>
        <li class="breadcrumb-item"><a href="#">Editar</a></li>
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos del Tipo de Establecimientos</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('tipo_establecimientos.update',$tipo_establecimiento->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class=" row mb-4">
                <label for="nombre" class="col-md-3 form-label">Nombre</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$tipo_establecimiento->nombre}}">
                </div>
            </div>
            <div class=" row mb-4">
                <label for="estatus" class="col-md-3 form-label">Estatus</label>
                <div class="col-md-9">
                    <select class="form-control select2" id='activo' name='activo'>
                        <option value="0" {{ ($tipo_establecimiento->activo==0) ? 'selected' : '' }}>INACTIVO</option>
                        <option value="1" {{ ($tipo_establecimiento->activo==1) ? 'selected' : '' }}>ACTIVO</option>
                    </select>
                </div>
            </div>

            <hr>
            <div class="mb-0 mt-4 row justify-content-end">
                <div class="col-md-12">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
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
