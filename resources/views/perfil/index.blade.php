@extends('layouts.app')

@section('titulo')
  Perfil
@endsection


@section('breadcrum')
    <ol class="breadcrumb">        
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>        
        <li class="breadcrumb-item"><a href="#">Perfil</a></li>                
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos del usuario</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('perfil.update')}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{\Auth::user()->id}}" />
            <div class=" row mb-4">
                <label for="inputEmail3" class="col-md-3 form-label">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="email" readonly name="email" placeholder="" value="{{ \Auth::user()->email }}">
                </div>
            </div>
            
            <div class=" row mb-4">
                <label for="inputName" class="col-md-3 form-label">Nombre</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{\Auth::user()->name}}">
                </div>
            </div>            
            
            <div class="mb-0 mt-4 row justify-content-end">
                <div class="col-md-12">                    
                    <button class="btn btn-success pull-right"><i class="fa fa-check"></i> Aceptar</button>                                        
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
