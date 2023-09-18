<!-- resources/views/content.blade.php -->
@extends('welcome')

@section('content')
    
<div class="mt-20 flex space-x-4 mb-10">        
            <div class="m-2 flex-auto text-left inline-block animate-left">
                <h1 class="ml-2 mx-8 text-2xl font-bold mt-4">Si necesitas a alguien que te escuche</h1>
                <h1 class="ml-2 mx-8 text-2xl font-bold mt-4">la Universidad de Guadalajara te ayuda. ¡Agenda tu cita!"</h1>
            </div>
            <div class="m-2 flex-auto text-center">
                <img class="h-80 w-80 mr-2 animate-bounce"src="{{ asset('Imagenes/portada.png') }}" alt="cerebro">
            </div>
    </div>
    
@endsection