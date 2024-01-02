<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>Recuperar</title>
       
    </head>
    <body >

      @if(Session::has('success'))
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
                      <p class="text-sm text-green-700">Cambio realizado con con exito, puede ingresar con su nueva contraseña</p>
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
                      <p class="text-sm text-red-700">la contraseña no coinciden, favor de verificar</p>
                  </div>
              </div>
          </div>
      </div>
      @endif

        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <img class="mx-auto h-20 w-auto" src="{{ asset('Imagenes/cerebro.png') }}" alt="Your Company">
              <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Recuperar contraseña</h2>
              <h2 class="mt-4 text-center text-sm font-bold leading-9 tracking-tight text-gray-900">Hola {{$correo}}, digite su nueva contraseña</h2>
            </div>
        
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
              <form class="space-y-6" action="{{ route('cambiarPass')}}" method="POST">
                @csrf
                <input type="hidden" name="correo" value="{{$correo}}">
                <div>
                  <label class="block text-sm font-medium leading-6 text-gray-900">Ingresa Contraseña</label>
                  <div class="mt-2">
                    <input type="password" name="pass1" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
          
                <div>
                  <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">vuelve a ingresar tu contraseña</label>
                  </div>
                  <div class="mt-2">
                    <input id="password" name="pass2" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
          
                <div>
                  <button type="submit" class="flex w-full justify-center rounded-md bg-cyan-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        
        
        
    </body>
</html>
