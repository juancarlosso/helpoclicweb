@extends('layouts.app')

@section('titulo')
  Tipo Establecimientos
@endsection

@section('estilos')
<!-- INTERNAL SELECT2 CSS -->
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
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
                      <table id="lista" class="table  table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th style="width:100px">Activo</th>
                                  <th>Nombre</th>
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
                                  <td style="width: 150px">
                                      <a href="{{route('tipo_establecimientos.edit',$tipo_establecimiento->id)}}" class="btn btn-secondary btn-sm ms-2"><i class="fa fa-edit"></i></a>
                                      <a onclick="return confirm('¿Borrar el tipo_establecimiento {{$tipo_establecimiento->nombre}}?')" href="{{route('tipo_establecimientos.eliminar',$tipo_establecimiento->id)}}" class="btn btn-red btn-sm ms-2"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{ $tipos_establecimientos->links();  }}
                </div>
            </div>
    </div>
</div>




@endsection

