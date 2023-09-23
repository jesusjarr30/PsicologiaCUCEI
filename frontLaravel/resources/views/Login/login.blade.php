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
    {{-- div principal --}}
        <div class="flex w-full h-screen">
            {{-- div izquierdo --}}
            <div class="w-full flex items-center justify-center lg:w-1/2 ">
                
                <div class="bg-white px-8 py-10 rounded-3xl border-2 border-gray-200">
            <h1 class="text-4xl font-semibold">Bienvenidos</h1>
            <div class="mt-8">
                <div>
                    <label class="text-lg font-medium">Correo</label>
                    <input class="w-full border-2 border-gray-100 rounded-xl p-4 mt-1 bg-transparent" placeholder="Ingresa tu correo" type="text">
                </div>
                <div>
                    <label class="text-lg font-medium">Contraseña</label>
                    <input class="w-full border-2 border-gray-100 rounded-xl p-4 mt-1 bg-transparent" placeholder="Ingresa tu contraseña" type="password">
                </div>
            </div>
            <div class="mt-8 flex justify-between items-center">
                <button class="font-medium text-base text-blue-300">¿Olvidó su contraseña?</button>
            </div>
            <div class="mt-8 flex flex-col gap-y-4">
                <button class="active:scale-[.95] active:duration-75 hover:scale-[1.01] ease-in-out py-3 rounded-xl bg-blue-500 text-white text-lg font-bol">
                    Ingresar
                </button>
                <button class='flex items-center justify-center gap-2 active:scale-[.98] active:duration-75 transition-all hover:scale-[1.01] ease-in-out transform py-4  rounded-xl bg-orange-400 text-white font-semibold text-lg border-2 border-gray-100 '>
                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.26644 9.76453C6.19903 6.93863 8.85469 4.90909 12.0002 4.90909C13.6912 4.90909 15.2184 5.50909 16.4184 6.49091L19.9093 3C17.7821 1.14545 15.0548 0 12.0002 0C7.27031 0 3.19799 2.6983 1.24023 6.65002L5.26644 9.76453Z" fill="#EA4335"/>
                        <path d="M16.0406 18.0142C14.9508 18.718 13.5659 19.0926 11.9998 19.0926C8.86633 19.0926 6.21896 17.0785 5.27682 14.2695L1.2373 17.3366C3.19263 21.2953 7.26484 24.0017 11.9998 24.0017C14.9327 24.0017 17.7352 22.959 19.834 21.0012L16.0406 18.0142Z" fill="#34A853"/>
                        <path d="M19.8342 20.9978C22.0292 18.9503 23.4545 15.9019 23.4545 11.9982C23.4545 11.2891 23.3455 10.5255 23.1818 9.81641H12V14.4528H18.4364C18.1188 16.0119 17.2663 17.2194 16.0407 18.0108L19.8342 20.9978Z" fill="#4A90E2"/>
                        <path d="M5.27698 14.2663C5.03833 13.5547 4.90909 12.7922 4.90909 11.9984C4.90909 11.2167 5.03444 10.4652 5.2662 9.76294L1.23999 6.64844C0.436587 8.25884 0 10.0738 0 11.9984C0 13.918 0.444781 15.7286 1.23746 17.3334L5.27698 14.2663Z" fill="#FBBC05"/>
                    </svg>
                    Sign in with Google
                </button>
            </div>
            <div class="mt-8 flex justify-between items-center">
                <p class='font-medium text-base'>¿No tienes una Cuenta? Contacta a tu administrador</p>
                
            </div>
        </div>

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

