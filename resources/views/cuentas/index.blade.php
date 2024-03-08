@extends('layouts.app')

@section('titulo')
  Cuentas
@endsection

@section('estilos')
<!-- INTERNAL SELECT2 CSS -->
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('cuentas.index')}}">Cuentas</a></li>
    </ol>
@endsection

@section('contenido')
<div class="row ">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado</h3>
                    <div class="card-options">
                        <a href="{{route('cuentas.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Cuenta</a>
                    </div>
                </div>
                <div class="card-body">
                      <table id="lista" class="table  table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th style="width:100px">Activa</th>
                                  <th>Nombre</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($cuentas as $cuenta)
                              <tr>
                                  <td>
                                     <span class="pull-right tag tag-radius tag-round tag-outline-{{ ($cuenta->activa==1) ? 'success' : 'danger' }}">
                                          {{ ($cuenta->activa == 1) ? 'Activa' : 'Inactiva' }}
                                     </span>
                                  </td>
                                  <td>
                                      {{$cuenta->nombre}}
                                  </td>
                                  <td style="width: 150px">
                                      <a href="{{route('cuentas.edit',$cuenta->id)}}" class="btn btn-secondary btn-sm ms-2"><i class="fa fa-edit"></i></a>
                                      <a onclick="return confirm('¿Borrar la cuenta {{$cuenta->nombre}}?')" href="{{route('cuentas.eliminar',$cuenta->id)}}" class="btn btn-red btn-sm ms-2"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{ $cuentas->links();  }}
                </div>
            </div>
    </div>
</div>




@endsection

