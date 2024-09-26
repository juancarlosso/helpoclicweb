@extends('layouts.app')

@section('titulo')
  Cuentas
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('cuentas.index')}}">Cuentas</a></li>
        <li class="breadcrumb-item"><a href="#">Nueva</a></li>
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos de la nueva cuenta</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('cuentas.store')}}" enctype="multipart/form-data">
            @csrf
            <div class=" row mb-4">
                <label for="nombre" class="col-md-3 form-label">Nombre</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="telefono" class="col-md-3 form-label">Estatus</label>
                <div class="col-md-9">
                    <select class="form-control select2" id='activa' name='activa'>
                        <option value="0" selected>INACTIVA</option>
                        <option value="1" selected>ACTIVA</option>
                    </select>
                </div>
            </div>
            <hr>

            <div class="row mb-4">
                <label for="mostrar_seguros" class="col-md-3 form-label">Mostrar Seguros</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="mostrar_seguros" id="mostrar_seguros">
                        <option value="0">No</option>
                        <option value="1" {{ old('mostrar_seguros') == '1' ? 'selected' : '' }}>Sí</option>
                    </select>
                </div>
            </div>

            <div class="mb-0 mt-4 row justify-content-end">
                <div class="col-md-12">
                    <a href="{{route('cuentas.index')}}" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
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
