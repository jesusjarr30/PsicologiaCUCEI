<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
          

        <!-- Styles -->
        <style>
          
        </style>
    </head>

    <nav class="flex items-center justify-between flex-wrap bg-blue-800 p-6">
        <!-- Logo de cucei -->
        <div class="pl-5">
              <img class="h-[2rem] sm:h-[2.8rem]" alt="Logo CUCEI" src="{{ asset('Imagenes/logo_cucei-udg_blanco.png') }}">
        </div>
        <div class="m-2 sm:m-4 h-10 w-[1px] bg-white"></div>

        <!-- Logo Psicología CUCEI -->
        <img class="h-[1.9rem] sm:h-[2.5rem]" src="{{ asset('Imagenes/cerebro.png') }}" alt="cerebro">
        <div class="logo font-medium text-yellow-500 text-xs sm:text-base ml-2 sm:ml-4 py-2 leading-4 sm:leading-5 w-3">
          Psicología <span class="text-white">CUCEI</span>
        </div>


        <!-- Logos de iniciar sesión -->
        <div class="flex flex-1 justify-end space-x-1 mr-2">
          <!-- Autentificación para mostrar la opción "Iniciar sesión" o "Sistema" -->
          <a class="flex items-center text-white mr-1 sm:mr-5" href="{{route('login')}}">
              <svg class="svg-inline--fa fa-right-to-bracket mr-0 sm:mr-2 text-xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="right-to-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M352 96h64c17.7 0 32 14.3 32 32V384c0 17.7-14.3 32-32 32H352c-17.7 0-32 14.3-32 32s14.3 32 32 32h64c53 0 96-43 96-96V128c0-53-43-96-96-96H352c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-7.5 177.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H160v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z" data-darkreader-inline-fill="" style="--darkreader-inline-fill: currentColor;"></path></svg><!-- <i class="mr-0 sm:mr-2 text-xl fas fa-right-to-bracket"></i> Font Awesome fontawesome.com -->
              <span class="float-right sm:float-none invisible sm:visible text-[0px] sm:text-sm">Iniciar sesión</span>
          </a>
          <div>
            <a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0" href="{{ route('cita')}}">Agendar Cita</a>
          </div>
        </div>

        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
       

        </div>
    </nav>
    
    @yield('content')

  
    <footer class="relative bg-blue-800 pt-8 pb-6">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap text-left lg:text-left">
          <div class="w-full lg:w-6/12 px-4">
            <img class="" alt="Logo CUCEI" src="{{ asset('Imagenes/logo_cucei-udg_blanco.png') }}">
            <h4 class="text-3xl fonat-semibold text-yellow-500">Mantente en contacto.!</h4>
            <h5 class="text-lg mt-0 mb-2 text-white">
              Plataforma diseñada pare el uso de los psicologos y estudiantes de cucei.
            </h5>
            <div class="mt-6 lg:mb-0 mb-6">
              <button class="bg-lightBlue-400 text-white shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <a href="https://www.facebook.com/ing.cucei" target="_blank" rel="noopener noreferrer">
                  <i class="fab fa-facebook-square"></i>
                </a>
              </button>
              
            </div>
            
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="flex flex-wrap items-top mb-6">
              <div class="w-full lg:w-4/12 px-4 ml-auto">
                <span class="block uppercase text-yellow-500 text-sm font-semibold mb-2">Links</span>
                <ul class="list-unstyled">
                  <li>
                    <a class="text-white hover:text-yellow-500 font-semibold block pb-2 text-sm" href="{{route('acercaDe')}}">Acerca de nosotros</a>
                  </li>
                  <li>
                    <a class="text-white hover:text-yellow-500 font-semibold block pb-2 text-sm" href="{{ route('des') }}">Desarrolladores</a>
                  </li>
                  <li>
                    <a class="text-white hover:text-yellow-500 font-semibold block pb-2 text-sm" href="{{ route('cita')}}">Agenda tu cita</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-6 border-blueGray-300">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
          <div class="w-full md:w-4/12 px-4 mx-auto text-center">
            <div class="text-sm text-blueGray-500 font-semibold py-1">
              Derechos reservados ©2022 - 2024. <span id="get-current-year">Universidad de Guadalajara.
            </div>
          </div>
        </div>
      </div>
    </footer>
    </body>
</html>