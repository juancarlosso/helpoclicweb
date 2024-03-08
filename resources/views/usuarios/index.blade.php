@extends('layouts.app')

@section('titulo')
  Usuarios
@endsection

@section('estilos')
<!-- DATA TABLE CSS -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet" />
<!-- INTERNAL SELECT2 CSS -->
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('usuarios.index')}}">Usuarios</a></li>
    </ol>
@endsection

@section('contenido')
<div class="row ">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado</h3>
                    <div class="card-options">
                        <a href="{{route('usuarios.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Agregar usuario</a>
                    </div>
                </div>
                <div class="card-body">
                      <table id="listado" class="table table-hover table-bordered nowrap" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Email</th>
                                  <th>Perfil</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($usuarios as $usuario)
                              <tr>
                                  <td>
                                      {{$usuario->name}}
                                  </td>
                                  <td>
                                     {{$usuario->email}}
                                  </td>
                                  <td>
                                     {{config('constantes.perfiles')[$usuario->perfil]}}
                                  </td>
                                  <td style="width: 100px">
                                      <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-secondary btn-sm ms-2"><i class="fa fa-edit"></i> </a>
                                      <a class="modal-effect btn btn-warning btn-sm ms-2" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modalpwd{{$usuario->id}}"><i class="fa fa-lock"></i></a>
                                      <a onclick="return confirm('¿Borrar el usuario {{$usuario->name}}?')" href="{{route('usuarios.eliminar',$usuario->id)}}" class="btn btn-danger btn-sm ms-2"><i class="fa fa-trash"></i></a>
                                  </td>
                                  <div class="modal fade" id="confirmaBorrar{{$usuario->id}}">
                                      <form id="form{{$usuario->id}}" action="{{ route('usuarios.destroy', $usuario->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                          <div class="modal-content modal-content-demo">
                                              <div class="modal-header">
                                                  <h6 class="modal-title">Confirmar</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
                                              </div>
                                              <div class="modal-body">
                                                  <h6>Cuidado, estás a punto de eliminar de manera definitiva el usuario: <br> <strong>{{$usuario->name}}</strong></h6>
                                                  <p><br>¿Realmente deseas eliminarlo?</p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-primary">Si, eliminar</button> <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                              </div>
                                          </div>
                                      </div>
                                      </form>
                                  </div>
                                  <div class="modal fade" id="modalpwd{{$usuario->id}}" aria-hidden="true" style="display: none;">
                                      <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                          <div class="modal-content modal-content-demo">
                                              <form method="post" action="{{route('usuarios.cambiarpwd')}}">
                                              <div class="modal-header">
                                                  <h6 class="modal-title">{{$usuario->name}}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="row">
                                                     <div class="col-sm-12">
                                                        <p class="pull-left text-muted">Para cambiar el password del usuario, por favor captúrelo y confirme</p>
                                                            @csrf
                                                            <input type="hidden" id="usuario_id" name="usuario_id" value="{{$usuario->id}}" />
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label for="nuevo" class="form-label pull-left"><strong>Nuevo password:</strong></label>
                                                                    <input type="password" class="form-control" id="nuevo" name="nuevo" placeholder="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="confirmar" class="form-label pull-left"><strong>Confirmar password:</strong></label>
                                                                    <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="" required>
                                                                </div>
                                                            </div>
                                                     </div>
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-success">Aceptar</button> <button class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                              </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
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
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script>
$(document).ready(function() {
    var table = $('#listado').DataTable( {
        responsive: true
    } );
} );
</script>
@endsection