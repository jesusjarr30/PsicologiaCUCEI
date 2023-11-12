<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Recuperar</title>
    <style>
        @media (max-width: 768px) {
            .bg-cover {
                background-size: 50px 50px;
            }
        }
    </style>
</head>
<body class="font-mono bg-gray-200">

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
                    <p class="text-sm text-green-700">Hemos envia un correo para que pueda restrablecer su contraseña</p>
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
                    <p class="text-sm text-red-700">No se a encontrado su correo en nuestra base de datos.</p>
                </div>
            </div>
        </div>
    </div>
    
    @endif

    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-7/8 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                    style="background-image: url('Imagenes/recoveryImages/portadaRecovery.png');
                    background-size: 500px 450px;
                    background-repeat: no-repeat;
           background-position: center;">
                    
                    
            </div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <div class="px-8 mb-4 text-center">
                        <h3 class="pt-4 mb-2 text-2xl">Olvido su contraseña?</h3>
                        <p class="mb-4 text-sm text-gray-700">
                            Lo entendemos, suceden cosas. Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un
                             enlace para restablecer su contraseña!
                        </p>
                    </div>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{route('inivtacioRecuperar')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="email"
                                type="email"
                                placeholder="Ingrese su correo..."
                            />
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Restaurar contraseña
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{route('login')}}"
                            >
                                ya tiene una cuenta? Login!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>