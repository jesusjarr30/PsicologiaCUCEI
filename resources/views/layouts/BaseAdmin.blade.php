<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Laravel</title>          
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Styles -->
        <style>
           
        </style>
    </head>
    
    <body class="bg-blueGray-50">
      <div class="min-h-screen">
        <div class="antialiased bg-gray-100 dark-mode:bg-gray-900">
        <div class="w-full text-white bg-indigo-500 dark-mode:bg-gray-800">
          <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between p-4">
              <a href="#" class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"
                >Administradores CUCEI</a>
              <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                  <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                  <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
              <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                href="{{ route('showUsuario') }}"
                >Usuarios</a>
              <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                href="{{ route('registrar') }}"
                >Agregar Usuario</a>
              <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                href=" {{ route('verClasificacion') }}">
                Clasificar Pacientes</a>
              <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                href=" {{ route('calendar.index',1) }}">
                Gestionar Citas</a>
              <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                href="{{ route('showCitas') }}"
                >Ver citas</a>
              <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                href="{{ route('showEstadisticas') }}"
                >Estadisticas</a>
              <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                href="{{ route('showPacientes') }}"
                >Pacientes</a>
              
              <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                >Cerrar sesion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>

              <div @click.away="open = false" class="relative" x-data="{ open: true }">
                 
            </nav>
          </div>
        </div>
      </div>
      @yield('contentAdmin')
        </div>
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

