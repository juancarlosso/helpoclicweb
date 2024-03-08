@extends('layouts.app')

@section('titulo')
Establecimientos
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
    <li class="breadcrumb-item"><a href="{{route('establecimientos.index')}}">Establecimientos</a></li>
</ol>
@endsection

@section('contenido')
<div class="row ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado</h3>
                <div class="card-options">
                    <a href="{{route('establecimientos.create')}}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Agregar Establecimiento</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="listado" class="table table-hover table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Activo</th>
                                <th>Tipo Establecimiento</th>
                                <th>Establecimiento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($establecimientos as $establecimiento)
                            <tr>
                                <td>
                                    <span class="pull-right tag tag-radius tag-round tag-outline-{{ ($establecimiento->activo==1) ? 'success' : 'danger' }}">
                                    {{ ($establecimiento->activo == 1) ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td>{{ $establecimiento->tipo->nombre }}</td>
                                <td>{{ $establecimiento->nombre }}</td>
                                <td>
                                    <form id="form-eliminar{{ $establecimiento->id }}" action="{{route('establecimientos.destroy',$establecimiento->id)}}" method="POST">
                                        @csrf @method('DELETE')
                                    </form>
                                    <a href="{{route('establecimientos.edit',$establecimiento->id)}}" class="btn btn-secondary btn-sm ms-2">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a onclick="eliminar('{{ $establecimiento->id }}','{{ $establecimiento->nombre }}')" href="#" class="btn btn-danger btn-sm ms-2">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $establecimientos->links();  }}
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
        //     var table = $('#listado').DataTable( {
        //         responsive: true
        //     } );
        // } );
        function eliminar(establecimiento_id,establecimiento) {
            if (confirm('¿Borrar el establecimiento '+establecimiento+'?') == true) {
                $('#form-eliminar'+establecimiento_id).submit();
            }
        }
    </script>
    @endsection