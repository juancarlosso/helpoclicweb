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
			<div class="row mb-4">
				<label for="tipo" class="col-md-3 form-label">Tipo</label>
				<div class="col-md-9">
					<select class="form-control select2" id="tipo" name="tipo" style="width: 100%">
						<option value="" disabled {{ old('tipo', $producto->tipo) ? '' : 'selected' }}>Seleccionar tipo</option>
						@foreach (config('constantes.tipos') as $llave => $valor)
							<option value="{{ $llave }}" {{ old('tipo', $producto->tipo) == $llave ? 'selected' : '' }}>
								{{ $llave }} - {{ $valor }}
							</option>
						@endforeach
					</select>
				</div>
			</div>

			<!-- Campo de precio que estará oculto inicialmente -->
			<div class="row mb-4" id="precio-container" style="{{ $producto->tipo == 1  }}">
				<label for="precio" class="col-md-3 form-label">Solicitar Precio</label>
				<div class="col-md-9">
					<input type="number" class="form-control" id="precio" name="precio"
						placeholder="Ingrese el precio" min="0.01" step="0.01" value="{{ old('precio', $producto->precio) }}" {{ $producto->tipo == 1 ? 'required' : '' }}>
				</div>
			</div>

			<!-- Campo de URL que estará oculto inicialmente -->
			<div class="row mb-4" id="url-container" style="{{ $producto->tipo == 3  }}">
				<label for="url" class="col-md-3 form-label">URL</label>
				<div class="col-md-9">
					<input type="url" class="form-control" id="url" name="url"
						placeholder="Ingrese la URL" value="{{ old('url', $producto->url) }}" {{ $producto->tipo == 3 ? 'required' : '' }}>
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
						<option value="1" {{ ($producto->activo) ? 'selected' : '' }}>Activo</option>
						<option value="0" {{ (!$producto->activo) ? 'selected' : '' }}>Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mb-4">
							<label for="activo" class="col-md-3 form-label">¿Tiene Descuento?</label>
							<div class="col-md-6">
											<select class="form-control select2" name="desc" id="desc">
															<option value="" selected>** SELECCIONA RESPUESTA **</option>
															<option value="si">Si</option>
															<option value="no">No</option>
											</select>
							</div>
			</div>
			<div class="row mb-4" style="display: none;" id="inputDiv">
							<label for="activo" class="col-md-3 form-label">¿Cuanto?</label>
							<div class="col-md-6">
											<input type="text" class="form-control decimales" id="descuento" name="descuento"
															value="{{ old('descuento', $producto->descuento)}}">
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


	$(document).ready(function() {
    // Función para mostrar/ocultar campos según el tipo
    function toggleFields(selectedValue) {
        if (selectedValue == 1) {
            // Mostrar el campo de precio y hacerlo obligatorio
            $('#precio-container').show();
            $('#precio').attr('required', true).attr('min', '0.01'); // Hacer el campo obligatorio y mayor a 0
            $('#url-container').hide(); // Ocultar el campo de URL
        } else if (selectedValue == 3) {
            $('#url-container').show(); // Mostrar el campo de URL y hacerlo obligatorio
            $('#url').attr('required', true);
            $('#precio-container').hide(); // Ocultar el campo de precio
            $('#precio').removeAttr('required').removeAttr('min');
        } else {
            $('#precio-container').hide(); // Ocultar el campo de precio
            $('#precio').removeAttr('required').removeAttr('min');
            $('#url-container').hide(); // Ocultar el campo de URL
            $('#url').removeAttr('required');
        }
    }

    // Ejecutar al cambiar el select
    $('#tipo').on('change', function() {
        var selectedValue = $(this).val();
        toggleFields(selectedValue);
    });

    // Llamar a la función al cargar la página para configurar los campos según el valor actual
    toggleFields($('#tipo').val());

				$('.decimales').on('input', function () {
					this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
			});
			$('#desc').change(function() {
						// Si la opción seleccionada es 'si', muestra el input
						if ($(this).val() === "si") {
										$('#inputDiv').show(); // Muestra el div que contiene el input
						} else {
										$('#inputDiv').hide(); // Oculta el div que contiene el input
						}
		});
});

</script>
@endsection
