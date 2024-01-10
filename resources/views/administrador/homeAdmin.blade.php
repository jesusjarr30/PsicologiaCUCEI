@extends('layouts.BaseAdmin')

@section('contentAdmin')



    
<div class="lg:flex h-screen w-screen items-center justify-center">
    <div class=" bg-gradient-to-tr from-blue-800 to-blue-500 rounded-2xl flex items-center justify-center">
      <img class="w-full h-auto sm:w-auto sm:h-full md:w-2/3 lg:w-full max-w-full max-h-full" src="{{ asset('Imagenes/logo_cucei-udg_blanco.png') }}" alt="Logo CUCEI">
    </div>
  </div>

  <div class="lg:hidden 2xl:hidden xl:hidden h-screen w-screen items-center justify-center">
    <div class=" mt-32 bg-gradient-to-tr from-blue-800 to-blue-500 rounded-2xl flex items-center justify-center">
        <img class="w-95 h-30" src="{{ asset('Imagenes/logo_cucei-udg_blanco.png') }}" alt="Logo CUCEI">
      </div>
  </div>
  
  
  
  

@endsection