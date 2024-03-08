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
		<form class="form-horizontal" method="POST" action="{{route('productos.store')}}" enctype="multipart/form-data">
			@csrf

			<div class="row mb-4">
				<label for="establecimiento" class="col-md-3 form-label">Establecimiento</label>
				<div class="col-md-9">
					<select class="form-control select2" name="establecimiento" id="establecimiento">
						<option value=""></option>
						@foreach ($establecimientos as $establecimiento)
						<option value="{{ $establecimiento->id }}" {{ ($establecimiento->id == old('establecimiento')) ? 'selected' : '' }}>
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
                       		<option value="{{$llave}}">{{$llave}} - {{$valor}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

			<div class="row mb-4">
				<label for="nombre" class="col-md-3 form-label">Nombre producto</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
				</div>
			</div>
			<div class="row mb-4">
				<label for="descripcion" class="col-md-3 form-label">Descripción</label>
				<div class="col-md-9">
					<textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{ old('descripcion') }}</textarea>
				</div>
			</div>
			<div class="row mb-4">
				<label for="activo" class="col-md-3 form-label">Activo</label>
				<div class="col-md-9">
					<select class="form-control select2" name="activo" id="activo">
						<option value="1" selected>Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label for="imagen" class="col-md-3 form-label">Imagen</label>
				<div class="col-md-9">
					<input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
				</div>
			</div>
			<div class="row mb-4">
				<label for="condiciones" class="col-md-3 form-label">Condiciones ( PDF )</label>
				<div class="col-md-9">
					<input type="file" class="form-control" id="condiciones" name="condiciones" accept="application/pdf">
				</div>
			</div>
			<hr>

			<div class="mb-0 mt-4 row justify-content-end">
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
		$('#establecimiento').select2({
			placeholder: "Seleccione establecimiento...",
			allowClear: true
		});

		$('#tipo').select2({
			placeholder: "Seleccione Tipo...",
			allowClear: true
		});
	});
	$(".select2").select2();
</script>
@endsection