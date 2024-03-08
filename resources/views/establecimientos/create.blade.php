@extends('layouts.app')

@section('titulo')
Establecimiento
@endsection


@section('breadcrum')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('establecimientos.index')}}">Establecimiento</a></li>
    <li class="breadcrumb-item"><a href="#">Nuevo</a></li>
</ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos del nuevo establecimiento</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('establecimientos.store')}}" enctype="multipart/form-data">
            @csrf


            <div class="row mb-4">
                <label for="proveedor" class="col-md-3 form-label">Cuenta</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="cuenta_id" id="cuenta_id">
                        <option value=""> ** SELECCIONA **</option>
                        @foreach ($cuentas as $cuenta)
                        <option value="{{ $cuenta->id }}" {{ ($cuenta->id == old('cuenta_id')) ? 'selected' : '' }}>
                            {{ $cuenta->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class=" row mb-4">
                <label for="razon_social" class="col-md-3 form-label">Tipo Establecimiento</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="tipo_id" id="tipo_id">
                        <option value=""> ** SELECCIONA **</option>
                        @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ ($tipo->id == old('tipo_id')) ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class=" row mb-4">
                <label for="razon_social" class="col-md-3 form-label">Nombre</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{old('nombre')}}">
                </div>
            </div>

            <div class=" row mb-4">
                <label for="razon_social" class="col-md-3 form-label">Mostrar Seguros</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="mostrar_seguros" id="mostrar_seguros">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                </div>
            </div>

            <div class=" row mb-4">
                <label for="razon_social" class="col-md-3 form-label">Mostrar Productos</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="mostrar_productos" id="mostrar_productos">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
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

            <div class="mb-0 mt-4 row justify-content-end">
                <div class="col-md-12">
                    <a href="{{route('establecimientos.index')}}" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-check"></i> Aceptar</button>
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