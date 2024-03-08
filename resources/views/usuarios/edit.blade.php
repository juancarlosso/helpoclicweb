@extends('layouts.app')

@section('titulo')
  Usuarios
@endsection


@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('usuarios.index')}}">Usuarios</a></li>
        <li class="breadcrumb-item"><a href="#">Nuevo</a></li>
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos del usuario actual</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('usuarios.update',$usuario->id)}}">
            @csrf
            @method('PUT')
            <input type="hidden" id="activo" name="activo" value="1" />
            <div class=" row mb-4">
                <label for="inputName" class="col-md-3 form-label">Nombre</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ ( old('name') == '' ? $usuario->name :  old('name')  )  }}">
                </div>
            </div>
            <div class=" row mb-4">
                <label for="inputEmail3" class="col-md-3 form-label">Email</label>
                <div class="col-md-9">
                    <input type="email" readonly class="form-control" id="email" name="email" placeholder="" value="{{ ( old('email') == '' ? $usuario->email :  old('email')  )  }}">
                </div>
            </div>

            <div class=" row mb-4">
                <label for="inputPassword3" class="col-md-3 form-label">Perfil</label>
                <div class="col-md-9">
                    <select class="form-control select2" id='perfil' name='perfil' style="width: 100%">
                        @foreach(config('constantes.perfiles') as $llave => $valor )
                        <option value="{{$llave}}" {{ $llave == $usuario->perfil ? 'selected' : '' }}>{{$llave}} - {{$valor}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- <div class="row mb-4" id='rowCuenta'>
                <label for="inputPassword3" class="col-md-3 form-label">Cuenta</label>
                <div class="col-md-9">
                    <select class="form-control select2" id='cuenta_id' name='cuenta_id' style="width: 100%">
                        @foreach($cuentas as $cuenta )
                        <option value="{{$cuenta->id}}" {{ $cuenta->id == $usuario->cuenta_id ? 'selected' : '' }}>{{$cuenta->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}

            <div class="mb-0 mt-4 row justify-content-end">
                <div class="col-md-12">
                    <a href="{{route('usuarios.index')}}" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
                    <button class="btn btn-success pull-right"><i class="fa fa-check"></i> Aceptar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
//   $('#perfil').change( function(){
//       if(this.value=='2'){
//          $('#rowCuenta').show();
//       }
//       else{
//          $('#rowCuenta').hide();
//       }
//   });

//   $('#perfil').trigger('change');
</script>
@endsection