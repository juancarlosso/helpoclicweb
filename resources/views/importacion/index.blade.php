@extends('layouts.app')

@section('titulo')
  Importación
@endsection

@section('breadcrum')
    <ol class="breadcrumb">        
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>        
        <li class="breadcrumb-item"><a href="#">Importación</a></li>                
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Importar archivo xls en cuenta</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{route('importacion.procesar')}}" enctype="multipart/form-data">
            @csrf   
            <div class=" row mb-4">
              <div class="col-sm-12">              
                   {{-- <div class="alert alert-info" role="alert"> --}}
                        <strong>CONSIDERACIONES NECESARIAS DEL ARCHIVO A IMPORTAR</strong>
                        <a href="#extralargemodal" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#extralargemodal">Mostrar Ejemplo</a>                        
                        <br><br>
                        El archivo debe tener una sola pestaña <br>
                        Los encabezados deben empezar en el primer renglón y primer columna<br>
                        El orden de las columnas debe ser:  FOLIO, NOMBRE, EMAIL, TELEFONO, SEXO, FECHA NACIMIENTO<br>
                        Las longitudes permitidas en caracteres para cada columna son:<br>
                        FOLIO (16), NOMBRE (255), EMAIL (255), TELEFONO (50), SEXO (1), FECHA NACIMIENTO (10)<br>
                        Para la columna sexo use:  f=femenino, m=masculino, o=otro<br>
                        Para la fecha de nacimiento el formato es: AAAA-MM-DD y debe ser de tipo TEXTO<br> <br>                       
                   {{-- </div> --}}
              </div>
            </div>
            <div class=" row mb-4">
                <label for="telefono" class="col-md-2 form-label">Cuenta</label>
                <div class="col-md-10">
                    <select class="form-control select2" id='cuenta_id' name='cuenta_id'>
                        <option value="" selected>** SELECCIONA CUENTA **</option> 
                        @foreach($cuentas as $cuenta)
                        <option value="{{$cuenta->id}}">{{$cuenta->nombre}}</option> 
                        @endforeach                                               
                    </select>
                </div>
            </div>                     
            
            <div class=" row mb-4">
                <label for="nombre" class="col-md-2 form-label">Archivo XLS</label>
                <div class="col-md-10">
                    <input type="file" class="form-control" id="archivo" placeholder="Archivo XLS" name="archivo" accept=".xlsx" value="">
                </div>
            </div>
            
            <div class=" row mb-4">
                <label for="telefono" class="col-md-2 form-label">Vigencia</label>
                <div class="col-md-10">
                    <select class="form-control select2" id='dias_vigencia' name='dias_vigencia'>
                        <option value="30" selected>1 Mes</option>
                        <option value="60" selected>2 Meses</option>
                        <option value="90" selected>3 Meses</option>
                        <option value="180" selected>6 Meses</option>
                        <option value="365" selected>1 Año</option>
                    </select>
                </div>
            </div>
                                    
            <div class="mb-0 mt-4 row justify-content-end">
                <div class="col-md-12">                    
                    <button class="btn btn-success pull-right"><i class="fa fa-check"></i> Importar</button>                                        
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="extralargemodal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ejemplo de Archivo de Importación</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">×</span>
  </button>
            </div>
            <div class="modal-body">
               <img src="{{ asset('assets/images/media/ejemploImportar.png') }}" style="width: 99%"></img>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

