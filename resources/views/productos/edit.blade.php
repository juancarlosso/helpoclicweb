@extends('layouts.app')

@section('estilos')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('titulo')
Producto
@endsection


@section('breadcrum')
<ol class="breadcrumb">        
	<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>        
	<li class="breadcrumb-item"><a href="{{route('productos.index')}}">Producto</a></li>                
	<li class="breadcrumb-item"><a href="#">Nuevo</a></li>                
</ol>
@endsection

@section('contenido')
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Datos del nuevo producto</h4>
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="POST" action="{{route('productos.update',$producto->id)}}" enctype="multipart/form-data">
			@csrf
			@method('PUT')

			<div class="row mb-4">
				<label for="establecimiento" class="col-md-3 form-label">Establecimiento</label>
				<div class="col-md-9">
					<select class="form-control select2" name="establecimiento" id="establecimiento">
						<option value=""></option>
						@foreach ($establecimientos as $establecimiento)
						<option value="{{ $establecimiento->id }}" {{ ($establecimiento->id == $producto->establecimiento_id) ? 'selected' : '' }}>
							{{ $establecimiento->nombre }}
						</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class=" row mb-4">
                <label for="tipo" class="col-md-3 form-label">Tipo</label>
                <div class="col-md-9">
                    <select class="form-control select2" id='tipo' name='tipo' style="width: 100%">
                        @foreach(config('constantes.tipos') as $llave => $valor )
                        <option value="{{$llave}}" {{ $llave == $producto->tipo ? 'selected' : '' }}>{{$llave}} - {{$valor}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
			<div class="row mb-4">
				<label for="nombre" class="col-md-3 form-label">Nombre producto</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre ?? old('nombre') }}">
				</div>
			</div>

			<div class="row mb-4">
				<label for="descripcion" class="col-md-3 form-label">Descripción</label>
				<div class="col-md-9">
					<textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{ $producto->descripcion ?? old('descripcion') }}</textarea>
				</div>
			</div>
			
			<div class="row mb-4">
				<label for="activo" class="col-md-3 form-label">Activo</label>
				<div class="col-md-9">
					<select class="form-control select2" name="activo" id="activo">
						<option value="true" {{ ($producto->activo) ? 'selected' : '' }}>Activo</option>
						<option value="false" {{ (!$producto->activo) ? 'selected' : '' }}>Inactivo</option>
					</select>
				</div>
			</div>
		
			<div class="row mb-4">
				<label for="imagen" class="col-md-3 form-label">Imagen</label>
				<div class="col-md-7">
					<input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
				</div>
				<div class="col-md-2">
					@if ($producto->imagen)
					<img src="{{ asset('storage/'.$producto->imagen) }}" width="60%">
					@else
					-sin imagen-
					@endif
				</div>
			</div>

			<div class="row mb-4">
				<label for="condiciones" class="col-md-3 form-label">Condiciones ( PDF )</label>
				<div class="col-md-7">
					<input type="file" class="form-control" id="condiciones" name="condiciones" accept="application/pdf">
				</div>
				<div class="col-md-2">
				@if ($producto->condiciones)
					<a href="{{ asset('storage/'.$producto->condiciones) }}" target="_blank" class="btn btn-secondary"><i class="fa fa-file-pdf"></i> Actual</a>
				@endif
				</div>
			</div>

			<div class="mb-0 mt-4 row justify-content-end">
				<hr>
				<div class="col-md-12">
					<a href="{{route('productos.index')}}" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
					<button class="btn btn-success pull-right" type="submit"><i class="fa fa-check"></i> Aceptar</button>
				</div>
			</div>

		</form>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#proveedor').select2({
			placeholder: "Seleccione proveedor...",
			allowClear: true
		});
	});
</script>
@endsection