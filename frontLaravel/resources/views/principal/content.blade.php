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


    <div class="w-full bg-gray-50 py-16 px-4 ">
        <div class="max-w-[1240px] mx-auto grid md:grid-cols-2">
        <img class='w-[500px] mx-auto my-4' src="{{  asset('Imagenes/automatizacion.jpg') }}" />
        <div class='flex flex-col justify-center'>
          <p class='text-[#7087EF] font-bold text-lg'>Objetivo</p>
          <p class='md:text-4xl sm:text-3x1 text-2xl font-bold'>Plataforma de Automatización Psicológica</p>
          

          <p>
            Generar una plataforma para que los alumnos que necesitan ayuda psicológica en nuestro CUCEI puedan 
            contar con las herramientas para solicitar apoyo y seguir siendo parte de nuestra institución.
          </p>
        </div>
        </div>
    </div>

    <section class="text-gray-600 body-font bg-cyan-400">
      <div class="container px-5 py-24 mx-auto flex flex-wrap">
      <h1 class="text-2xl font-medium title-font mb-4 text-white tracking-widest">¿Cómo funciona?</h1>
          <div class="flex flex-wrap w-full">
          <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
              <div class="flex relative pb-12">
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  
              </div>
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" trokeLinecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="../Imagenes/iconos_instrucciones/registro.svg"></path>
                  </svg>
              </div>
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>

              <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider"><strong>Paso 1</strong></h2>
                  <p class="leading-relaxed text-white">Dar click en "Agendar Cita" y llenar el formulario que se te pide</p>
              </div>
              </div>
              <div class="flex relative pb-12">
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
              </div>
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" trokeLinecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                  </svg>
              </div>
              <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">Paso 2</h2>
                  <p class="leading-relaxed text-white">Cuando se asigne un psicólogo a tu caso, te enviaremos un correo con los detalles.</p>
              </div>
              </div>
              <div class="flex relative pb-12">
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
              </div>
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" trokeLinecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <circle cx="12" cy="5" r="3"></circle>
                  <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                  </svg>
              </div>
              <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">Paso 3</h2>
                  <p class="leading-relaxed text-white">Confirma tu cita por correo</p>
              </div>
              </div>
              <div class="flex relative pb-12">
              <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
              </div>
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" trokeLinecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                  </svg>
              </div>
              <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">Paso 4</h2>
                  <p class="leading-relaxed text-white">Acudir a tu cita en la fecha y horario establecido</p>
              </div>
              </div>
              <div class="flex relative">
              <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                  <svg fill="none" stroke="currentColor" trokeLinecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                  <path d="M22 4L12 14.01l-3-3"></path>
                  </svg>
              </div>
              <div class="flex-grow pl-4">
                  <h2 class="font-medium title-font text-sm text-white mb-1 tracking-wider">FINISH</h2>
                  <p class="leading-relaxed text-white">Repite el proceso si continuas necesitando ayuda.</p>
              </div>
              </div>
          </div>
          <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="{{ asset('Imagenes/portada.jpg') }}" alt="step"/>
          </div>
      </div>
      </section>
  
    

    
    
@endsection