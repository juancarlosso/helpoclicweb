@extends('layouts.app')

@section('titulo')
  Dashboard
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
@endsection

@section('contenido')
 @if(auth()->user()->perfil==1)
<div class="row ">
    <div class="col-md-12">
        <div class="row">
            {{-- <div class="col-sm-4">
                <div class="card bg-warning img-card box-secondary-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{$cuentas}}</h2>
                                <p class="text-white mb-0">Cuentas</p>
                            </div>
                            <div class="ms-auto"> <i class="fa fa-folder text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-4">
                <div class="card  bg-success img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{$usuarios}}</h2>
                                <p class="text-white mb-0">Usuarios</p>
                            </div>
                            <div class="ms-auto"> <i class="fa fa-user text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
  <div class="col-sm-12">
     <img src="{{ asset('assets/images/media/medicina1.jpg') }}" width="100%" />
  </div>
</div>
@endsection
