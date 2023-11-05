<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Laravel</title>

        <!-- Fonts -->

        <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
        <!-- Styles -->
        <style>
            body {
        margin: 0;
        background: rgb(6, 182, 212);
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

           
        </style>
    </head>
    <body class="antialiased body">
        @if(session('success'))
          <div class="alert alert-success">
              <div class="bg-green-100 border-t-4 border-green-500 rounded-b px-4 py-3 shadow-md my-4">
                <div class="flex items-center">
                    <div class="text-green-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="mx-3">
                        <span class="font-semibold text-green-700">Exito!</span>
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
          </div>
        @endif
    {{-- div principal --}}
        <div class="flex w-full h-screen">
            {{-- div izquierdo --}}
            <div class="w-full flex items-center justify-center lg:w-1/2 ">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                
                <div class="bg-white px-8 py-10 rounded-3xl border-2 border-gray-200">
            <h1 class="text-4xl font-semibold">Bienvenidos</h1>
            <div class="mt-8">
                <div>
                    <label class="text-lg font-medium">Correo</label>
                    <input class="w-full border-2 border-gray-100 rounded-xl p-4 mt-1 bg-transparent" placeholder="Ingresa tu correo" 
                    type="text"
                    name="email">
                    @error('email')
                        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
                          <div class="flex items-center">
                              <div class="text-red-700">
                                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                  </svg>
                              </div>
                              <div class="mx-3">

                                  <p class="text-sm text-red-700">email requerido.</p>
                              </div>
                          </div>
                      </div>
                    @enderror
                </div>
                <div>
                    <label class="text-lg font-medium">Contraseña</label>
                    <input class="w-full border-2 border-gray-100 rounded-xl p-4 mt-1 bg-transparent" placeholder="Ingresa tu contraseña" 
                    type="password"
                    name="password"
                    >
                    @error('password')
                        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
                          <div class="flex items-center">
                              <div class="text-red-700">
                                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                  </svg>
                              </div>
                              <div class="mx-3">

                                  <p class="text-sm text-red-700">Password Requerido.</p>
                              </div>
                          </div>
                      </div>
                    @enderror
                </div>
            </div>
            <div class="mt-8 flex justify-between items-center">
                <button class="font-medium text-base text-blue-300">¿Olvidó su contraseña?</button>
            </div>
            <div class="mt-8 flex flex-col gap-y-4">
                <button class="active:scale-[.95] active:duration-75 hover:scale-[1.01] ease-in-out py-3 rounded-xl bg-blue-500 text-white text-lg font-bol">
                    Ingresar
                </button>
            </div>
            <div class="mt-8 flex justify-between items-center">
                <p class='font-medium text-base'>¿No tienes una Cuenta? Contacta a tu administrador</p>
                
            </div>
        </div>
    </form>
            </div>
       

            {{-- div derecho --}}


            <div class="hidden relative lg:flex h-full w-1/2 items-center justify-center bg-gray-200">
            <div class="w-80 h-80 bg-gradient-to-tr from-violet-500 to-pink-500 rounded-full animate-bounce">
                <div class="flex items-center justify-center h-full">
                    <img class="h-40 w-40 animate-bounce" src="{{ asset('Imagenes/login-icons/cerebroLogin.png') }}">
                </div>
            </div>
        </div>
            

        </div>
    
</body>
</html>