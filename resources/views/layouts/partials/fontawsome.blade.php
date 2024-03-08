<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
@if (strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false)
   {{-- ESTE KIT ES FIJO, SIEMPRE SERÁ LOCAL --}}
   <script src="https://kit.fontawesome.com/8faff8ecab.js" crossorigin="anonymous"></script>
@else
   {{-- AQUI SIEMPRE HAY QUE PONER EL KIT PÚBLICO GLOBAL1 --}}
   <script src="https://kit.fontawesome.com/4946486498.js" crossorigin="anonymous"></script>
@endif