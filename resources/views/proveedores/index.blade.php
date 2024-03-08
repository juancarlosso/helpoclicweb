@extends('layouts.app')

@section('titulo')
Proveedores
@endsection

@section('estilos')
<!-- DATA TABLE CSS -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet" />
@endsection

@section('breadcrum')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{route('proveedores.index')}}">Proveedores</a></li>
</ol>
@endsection

@section('contenido')
<div class="row ">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Listado</h3>
				<div class="card-options">
					<a href="{{route('proveedores.create')}}" class="btn btn-success">
						<i class="fa fa-plus"></i> Agregar proveedor</a>
					</div>
				</div>
				<div class="card-body">
					<table id="listado" class="table table-hover table-bordered nowrap" style="width:100%">
						<thead>
							<tr>
								<th>RFC</th>
								<th>Razón Social</th>
								<th>Contacto</th>
								<th>Teléfono</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($proveedores as $proveedor)
							<tr>
								<td>{{ $proveedor->rfc }}</td>
								<td>{{ $proveedor->razon_social }}</td>
								<td>{{ ($proveedor->nombre_contacto) ? $proveedor->nombre_contacto : '-sin registrar-' }}</td>
								<td>{{ ($proveedor->telefono_contacto) ? $proveedor->telefono_contacto : '-sin registrar-' }}</td>
								<td>
									<form id="form-eliminar{{ $proveedor->id }}" action="{{route('proveedores.destroy',$proveedor->id)}}" method="POST">
										@csrf @method('DELETE')
									</form>
									<a href="{{route('proveedores.edit',$proveedor->id)}}" class="btn btn-secondary btn-sm ms-2">
										<i class="fa fa-edit"></i>
									</a>
									<a onclick="eliminar('{{ $proveedor->id }}','{{ $proveedor->razon_social }}')" href="#" class="btn btn-danger btn-sm ms-2">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
	<!-- DATA TABLE JS-->
	<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			var table = $('#listado').DataTable( {
				responsive: true
			} );
		} );
		function eliminar(proveedor,razon_social) {
			if (confirm('¿Borrar el proveedor '+razon_social+'?') == true) {
				$('#form-eliminar'+proveedor).submit();
			}
		}
	</script>
	@endsection