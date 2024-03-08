@extends('layouts.app')

@section('titulo')
  Cambiar Password
@endsection


@section('breadcrum')
    <ol class="breadcrumb">        
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>        
        <li class="breadcrumb-item"><a href="{{route('perfil.index')}}">Perfil</a></li>        
        <li class="breadcrumb-item"><a href="#">Cambiar Password</a></li>                
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Datos</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('perfil.updatepwd')}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{\Auth::user()->id}}" />
                        
            <div class=" row mb-4">
                <label for="inputName" class="col-md-3 form-label">Password Actual</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="actual" name="actual" placeholder="" value="" required>
                </div>
            </div>            
            <hr>
            
            <div class=" row mb-4">
                <label for="inputName" class="col-md-3 form-label">Password nuevo</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="nuevo" name="nuevo" placeholder="" value="" required>
                </div>
            </div>            
            
            <div class=" row mb-4">
                <label for="inputName" class="col-md-3 form-label">Confirmar</label>
                <div class="col-md-9">
                    <input type="pas" class="form-control" id="confirmar" name="confirmar" placeholder="" value="" required>
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
