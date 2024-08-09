@extends('layouts.app')

@section('titulo')
    Establecimiento
@endsection

@section('breadcrum')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('establecimientos.index') }}">Establecimiento</a></li>
    <li class="breadcrumb-item"><a href="#">Editar</a></li>
</ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos del establecimiento</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('establecimientos.update', $establecimiento->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <label for="cuenta_ids" class="col-md-3 form-label">Cuentas</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="cuenta_ids[]" id="cuenta_ids" multiple>
                        <option value=""> ** SELECCIONA **</option>
                        @foreach ($cuentas as $cuenta)
                            <option value="{{ $cuenta->id }}" {{ in_array($cuenta->id, old('cuenta_ids', $establecimiento->cuentas->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $cuenta->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <label for="tipo_id" class="col-md-3 form-label">Tipo Establecimiento</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="tipo_id" id="tipo_id">
                        <option value=""> ** SELECCIONA **</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}" {{ ($tipo->id == old('tipo_id', $establecimiento->tipo_id)) ? 'selected' : '' }}>
                                {{ $tipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <label for="nombre" class="col-md-3 form-label">Nombre</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ old('nombre', $establecimiento->nombre) }}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="mostrar_seguros" class="col-md-3 form-label">Mostrar Seguros</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="mostrar_seguros" id="mostrar_seguros">
                        <option value="0" {{ old('mostrar_seguros', $establecimiento->mostrar_seguros) == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('mostrar_seguros', $establecimiento->mostrar_seguros) == '1' ? 'selected' : '' }}>Sí</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <label for="mostrar_productos" class="col-md-3 form-label">Mostrar Productos</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="mostrar_productos" id="mostrar_productos">
                        <option value="0" {{ old('mostrar_productos', $establecimiento->mostrar_productos) == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('mostrar_productos', $establecimiento->mostrar_productos) == '1' ? 'selected' : '' }}>Sí</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <label for="activo" class="col-md-3 form-label">Activo</label>
                <div class="col-md-9">
                    <select class="form-control select2" id="activo" name="activo">
                        <option value="0" {{ old('activo', $establecimiento->activo) == '0' ? 'selected' : '' }}>INACTIVO</option>
                        <option value="1" {{ old('activo', $establecimiento->activo) == '1' ? 'selected' : '' }}>ACTIVO</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <label for="estado" class="col-md-3 form-label">Estado</label>
                <div class="col-md-9">
                    <select class="form-control select2" name="estado" id="estado">
                        <option value=""> ** SELECCIONA **</option>
                        @foreach ($estados as $key => $estado)
                            <option value="{{ $key }}" {{ old('estado', $establecimiento->estado) == $key ? 'selected' : '' }}>
                                {{ $estado }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
              <div class="row mb-4">
                <label for="ciudad" class="col-md-3 form-label">Ciudad</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ old('ciudad', $establecimiento->ciudad) }}">
                </div>
            </div>

            <div class="row mb-4">
                <label for="geolocalizacion" class="col-md-3 form-label">Geolocalización</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input class="form-control" name="geolocalizacion" id="geolocalizacion" type="text" value="{{ old('geolocalizacion', $establecimiento->geolocalizacion) }}">
                        <button type="button" class="btn btn-primary input-group-text" id="showMapBtn">Mostrar</button>
                    </div>
                </div>
            </div>

            <div class="mb-0 mt-4 row justify-content-end">
                <div class="col-md-12">
                    <a href="{{ route('establecimientos.index') }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
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

    document.getElementById('showMapBtn').addEventListener('click', function() {
            var geolocalizacion = document.getElementById('geolocalizacion').value;
            if (geolocalizacion) {
                var url = 'https://www.google.com/maps?q=' + encodeURIComponent(geolocalizacion);
                window.open(url, '_blank');
            } else {
                alert('Por favor, ingrese un código de geolocalización.');
            }
        });
</script>
@endsection
