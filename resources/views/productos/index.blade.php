@extends('layouts.app')

@section('titulo')
Productos
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
	<li class="breadcrumb-item"><a href="{{route('productos.index')}}">Producto</a></li>
</ol>
@endsection

@section('contenido')
<div class="row ">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Listado</h3>
				<div class="card-options">
					<a href="{{route('productos.create')}}" class="btn btn-success">
						<i class="fa fa-plus"></i> Agregar producto</a>
					</div>
				</div>
				<div class="card-body">
					<table id="listado" class="table table-hover table-bordered nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Activo</th>
								<th>Establecimiento</th>
								<th>Tipo</th>
								<th>Nombre</th>
								
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($productos as $producto)
							<tr>
								<td>
									<span class="pull-right tag tag-radius tag-round tag-outline-{{ ($producto->activo==1) ? 'success' : 'danger' }}">
                                    {{ ($producto->activo == 1) ? 'Activo' : 'Inactivo' }}
                                    </span>
								</td>
								<td>{{ ($producto->establecimiento) ? $producto->establecimiento->nombre : '-sin registrar-' }}</td>
								<td>{{config('constantes.tipos')[$producto->tipo]}}</td>
								<td>{{ $producto->nombre }}</td>
								<td>
									<form id="form-eliminar{{ $producto->id }}" action="{{route('productos.destroy',$producto->id)}}" method="POST">
										@csrf @method('DELETE')
									</form>
									<a href="{{route('productos.edit',$producto->id)}}" class="btn btn-secondary btn-sm ms-2">
										<i class="fa fa-edit"></i>
									</a>
									<a onclick="eliminar('{{ $producto->id }}','{{ $producto->nombre }}')" href="#" class="btn btn-danger btn-sm ms-2">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $productos->links();  }}
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
	<!-- DATA TABLE JS-->
	{{-- <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
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
	<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script> --}}
	<script>
		// $(document).ready(function() {
		// 	var table = $('#listado').DataTable( {
		// 		responsive: true
		// 	} );
		// } );
		function eliminar(producto,nombre) {
			if (confirm('¿Borrar el producto '+nombre+'?') == true) {
				$('#form-eliminar'+producto).submit();
			}
		}
	</script>
	@endsection