@extends('layouts.app')

@section('titulo')
Proveedores
@endsection


@section('breadcrum')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{route('proveedores.index')}}">Proveedores</a></li>
	<li class="breadcrumb-item"><a href="#">Editar</a></li>
</ol>
@endsection

@section('contenido')
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Datos del proveedor</h4>
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="POST" action="{{route('proveedores.update',$proveedor->id)}}">
			@csrf
			@method('PUT')

			<div class=" row mb-4">
				<label for="rfc" class="col-md-3 form-label">RFC</label>
				<div class="col-md-9">
					<input type="text" readonly class="form-control" id="rfc" name="rfc" placeholder="" value="{{ $proveedor->rfc ?? old('rfc') }}">
				</div>
			</div>
			<div class=" row mb-4">
				<label for="razon_social" class="col-md-3 form-label">Razón Social</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="" value="{{ $proveedor->razon_social ?? old('razon_social')}}">
				</div>
			</div>
			<div class=" row mb-4">
				<label for="nombre_contacto" class="col-md-3 form-label">Nombre contacto</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" placeholder="" value="{{ $proveedor->nombre_contacto ?? old('nombre_contacto') }}">
				</div>
			</div>
			<div class=" row mb-4">
				<label for="telefono_contacto" class="col-md-3 form-label">Teléfono contacto</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="telefono_contacto" name="telefono_contacto" placeholder="" value="{{ $proveedor->telefono_contacto ?? old('telefono_contacto') }}">
				</div>
			</div>
			<div class=" row mb-4">
				<label for="email_contacto" class="col-md-3 form-label">Email contacto</label>
				<div class="col-md-9">
					<input type="email" class="form-control" id="email_contacto" name="email_contacto" placeholder="" value="{{ $proveedor->email_contacto ?? old('email_contacto') }}">
				</div>
			</div>

			<div class="mb-0 mt-4 row justify-content-end">
				<div class="col-md-12">
					<a href="{{route('proveedores.index')}}" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
					<button class="btn btn-success pull-right" type="submit"><i class="fa fa-check"></i> Aceptar</button>
				</div>
			</div>

		</form>
	</div>
</div>
@endsection
