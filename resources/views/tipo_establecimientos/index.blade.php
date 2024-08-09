@extends('layouts.app')

@section('titulo')
  Tipo Establecimientos
@endsection

@section('estilos')
<!-- INTERNAL SELECT2 CSS -->
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<!-- Agregar CSS adicional si es necesario -->
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('tipo_establecimientos.index')}}">Tipo Establecimientos</a></li>
    </ol>
@endsection

@section('contenido')
<div class="row ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado</h3>
                <div class="card-options">
                    <a href="{{route('tipo_establecimientos.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a>
                </div>
            </div>
            <div class="card-body">
                <table id="lista" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:100px">Activo</th>
                            <th>Nombre</th>
                            <th>Imagen</th> 
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tipos_establecimientos as $tipo_establecimiento)
                        <tr>
                            <td>
                                <span class="pull-right tag tag-radius tag-round tag-outline-{{ ($tipo_establecimiento->activo==1) ? 'success' : 'danger' }}">
                                    {{ ($tipo_establecimiento->activo == 1) ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                {{$tipo_establecimiento->nombre}}
                            </td>
                            <td>
                                @if($tipo_establecimiento->imagen)
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalImage{{ $tipo_establecimiento->id }}">
                                    <i class="fa fa-eye"></i>
                                </button>
                                @else
                                    No disponible
                                @endif
                            </td>
                            
                            <td style="width: 150px">
                                <a href="{{route('tipo_establecimientos.edit',$tipo_establecimiento->id)}}" class="btn btn-secondary btn-sm ms-2"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('¿Borrar el tipo_establecimiento {{$tipo_establecimiento->nombre}}?')" href="{{route('tipo_establecimientos.eliminar',$tipo_establecimiento->id)}}" class="btn btn-red btn-sm ms-2"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tipos_establecimientos->links(); }}
            </div>
        </div>
    </div>
</div>

<!-- Modal para ver la imagen -->
@foreach($tipos_establecimientos as $tipo_establecimiento)
<div class="modal fade" id="modalImage{{ $tipo_establecimiento->id }}" tabindex="-1" aria-labelledby="modalImageLabel{{ $tipo_establecimiento->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-g"> <!-- Ajusta el tamaño del modal aquí -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImageLabel{{ $tipo_establecimiento->id }}">Imagen de {{ $tipo_establecimiento->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('storage/tipo_establecimientos/' . $tipo_establecimiento->imagen) }}" alt="Imagen de {{ $tipo_establecimiento->nombre }}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
