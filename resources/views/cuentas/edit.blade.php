@extends('layouts.app')

@section('titulo')
  Cuentas
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('cuentas.index')}}">Cuentas</a></li>
        <li class="breadcrumb-item"><a href="#">Editar</a></li>
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos de la cuenta</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('cuentas.update',$cuenta->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class=" row mb-4">
                <label for="nombre" class="col-md-3 form-label">Nombre</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cuenta->nombre}}">
                </div>
            </div>
            <div class=" row mb-4">
                <label for="estatus" class="col-md-3 form-label">Estatus</label>
                <div class="col-md-9">
                    <select class="form-control select2" id='activa' name='activa'>
                        <option value="0" {{ ($cuenta->activa==0) ? 'selected' : '' }}>INACTIVA</option>
                        <option value="1" {{ ($cuenta->activa==1) ? 'selected' : '' }}>ACTIVA</option>
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
