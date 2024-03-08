@extends('layouts.app')

@section('titulo')
  Importación
@endsection

@section('breadcrum')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('importacion.index')}}">Importación</a></li>
        <li class="breadcrumb-item"><a href="#">Resultado</a></li>
    </ol>
@endsection

@section('contenido')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Resultado de la importación</h4>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data">

            <div class="row mb-4">
                <label for="telefono" class="col-md-2 form-label">Cuenta</label>
                <div class="col-md-10">
                    <select class="form-control select2" id='cuenta_id' name='cuenta_id' disabled>
                        <option value="" selected>** SELECCIONA CUENTA **</option>
                        @foreach($cuentas as $cuenta)
                        <option value="{{$cuenta->id}}" {{ ($cuenta_id == $cuenta->id) ? 'selected' : '' }}>{{$cuenta->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">

               <div class="col-sm-4">
                   <div class="card widgets-cards bg-secondary box-primary-shadow">
                       <div class="card-body d-flex justify-content-center align-items-center">
                           <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="1" data-thickness="6" data-bs-color="#0393BF"><canvas width="192" height="192" style="height: 96px; width: 96px;"></canvas>
                               <div class="chart-circle-value text-white">100.00%</div>
                           </div>
                           <div class="wrp text-wrapper text-white p-3">
                               <p class="mt-0">{{$total}}</p>
                               <p class="mt-1 mb-0">Total de Registros</p>
                           </div>
                       </div>
                   </div>
               </div>


               <div class="col-sm-4">
                   <div class="card widgets-cards bg-success box-success-shadow">
                       <div class="card-body d-flex justify-content-center align-items-center">
                           <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="{{$porc_importados}}" data-thickness="6" data-bs-color="#0e8c79"><canvas width="192" height="192" style="height: 96px; width: 96px;"></canvas>
                               <div class="chart-circle-value text-white">{{number_format($porc_importados*100,2)}}%</div>
                           </div>
                           <div class="wrp text-wrapper text-white p-3">
                               <p class="mt-0">{{$validos}}</p>
                               <p class=" mt-1 mb-0">Importados</p>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="col-sm-4">
                  <div class="card widgets-cards bg-danger box-danger-shadow">
                      <div class="card-body d-flex justify-content-center align-items-center">
                          <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="{{$porc_no_importados}}" data-thickness="6" data-bs-color="#c21a1a"><canvas width="192" height="192" style="height: 96px; width: 96px;"></canvas>
                              <div class="chart-circle-value text-white">{{number_format($porc_no_importados*100,2)}}%</div>
                          </div>
                          <div class="wrp text-wrapper text-white p-3">
                              <p class="mt-0">{{count($invalidos)}}</p>
                              <p class=" mt-1 mb-0">No importados</p>
                          </div>
                      </div>
                  </div>
               </div>

               @if($filas)
               <div class="row">
                  <div class="col-sm-12">
                       <div class="alert alert-danger" role="alert">
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                           <i class="fa fa-frown-o me-2" aria-hidden="true"></i>
                           Los registros que no pudieron ser importados están en las siguientes filas: {{$filas}}
                       </div>
                  </div>
               </div>
               @endif

               @if(count($existen)>0)
                <br>
                <div class="row">
                   <div class="col-sm-12">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-frown-o me-2" aria-hidden="true"></i>
                            Los folios duplicados son los siguientes:
                            @foreach($existen as $folio)
                               {{$folio}} -
                            @endforeach
                        </div>
                   </div>
                </div>
                @endif

               <div class="mb-0 mt-4 row justify-content-end">
                   <div class="col-md-12">
                       <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Regresar</a>
                   </div>
               </div>

            </div>

        </form>
    </div>
</div>
@endsection



@section('scripts')
<!-- CHART-CIRCLE JS-->
<script src="{{ asset('/assets/js/circle-progress.min.js') }}"></script>
<!-- SPARKLINE JS-->
<script src="{{ asset('/assets/js/jquery.sparkline.min.js') }}"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{ asset('/assets/js/circle-progress.min.js') }}"></script>

<!-- MORRIS CHART JS-->
<script src="{{ asset('/assets/plugins/morris/raphael-min.js') }}"></script>
<script src="{{ asset('/assets/plugins/morris/morris.js') }}"></script>

<!-- CHARTJS CHART JS-->
<script src="{{ asset('/assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ asset('/assets/plugins/chart/utils.js') }}"></script>

<!-- C3 CHART JS-->
<script src="{{ asset('/assets/plugins/charts-c3/d3.v5.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/charts-c3/c3-chart.js') }}"></script>
@endsection