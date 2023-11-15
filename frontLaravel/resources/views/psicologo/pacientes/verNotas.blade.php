@extends('layouts.BasePsicologo')

@section('contentPsicologo')
<div class="h-screen w-auto bg-cyan-800">


    <section class="bg-white ">
    <div class="">
        
       <h1 class="text-center text-2xl font-bold mt-4 mb-4" >Notas del Paciente {{$cliente->nombre}} {{$cliente->apellidos}}</h1> 
    
       @if(session('success'))
        <div class="max-w-lg mx-auto">
            <div class="bg-green-100 border-t-4 border-green-500 rounded-b px-4 py-3 shadow-md my-4">
                <div class="flex items-center">
                    <div class="text-green-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="mx-3">
                        <span class="font-semibold text-green-700">Exito!</span>
                        <p class="text-sm text-green-700">Su Nota fue registrada</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(Session::has('error'))
          <div class="max-w-lg mx-auto">
              <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
                  <div class="flex items-center">
                      <div class="text-red-700">
                          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                          </svg>
                      </div>
                      <div class="mx-3">
                          <span class="font-semibold text-red-700">Error!</span>
                          <p class="text-sm text-red-700">No se pudo generar tu nota intentalo de nuevo</p>
                      </div>
                  </div>
              </div>
          </div>
          @endif
    
       <form method="POST" action="{{ route('GuardarNota') }}">
        @csrf
            <h2 class="ml-4">Ingrese Nueva Nota </h2>
            <input 
            name="titulo"
            class=" mt-4 w-3/4 md:w-full sm:w-full xs-full block p-2.5  text-sm text-gray-800 bg-gray-50 rounded-lg border 
        border-gray-300 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Titulo de la Nota"
            > 
        <textarea id="message" name="descripcion" rows="4" class=" mt-4 w-3/4 md:w-full sm:w-full xs-full block p-2.5  text-sm text-gray-800 bg-gray-50 rounded-lg border 
        border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Your message..."></textarea>
        <input type="hidden" name="pacienteID" value={{$cliente->id}} />
        <div class="ml-4 mt-8 ">
            <Button class=" mb-10 px-4 py-2 rounded-full bg-red-600 text-white border-2 border-red-800 hover:bg-red-800""><strong>Cancelar</strong></Button>
            <button class="mb-10 ml-6 px-4 py-2 rounded-full bg-green-600 text-white border-2 border-green-800 hover:bg-green-800"><strong>Guardar</strong></button>
        </form>
      </div>
    </section>
    
     
    <section class="bg-cyan-800 text-gray-100">
    
    
        <div class="container max-w-5xl px-4 py-12 mx-auto">
            <div class="grid gap-4 mx-4 sm:grid-cols-12">
                <div class="col-span-12 sm:col-span-3">
                    <div class="text-center sm:text-left mb-14 before:block before:w-24 before:h-3 before:mb-5 before:rounded-md before:mx-auto sm:before:mx-0 before:dark:bg-violet-400">
                        <h3 class="text-3xl font-semibold">Historial Notas </h3>
                        <span class="text-sm font-bold tracki uppercase dark:text-gray-400">Se uestra todas las notas regitradas del paciente</span>
                    </div>
                </div>
                <div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
                    
                    
                    <div class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:dark:bg-gray-700">
                        @foreach ($notas as $nota)
                        <div class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:dark:bg-violet-400">
                            <h3 class="text-xl font-semibold tracki">{{$nota->titulo}} </h3>
                            <time class="text-xs tracki uppercase dark:text-gray-400">{{$nota->created_at}}</time>
                            <p class="mt-3">{{$nota->description}}</p>
                        </div>
                        
                        @endforeach
                    </div>
                    
    
                </div>
            </div>
        </div>
    </section>
    
    </div>	


@endsection