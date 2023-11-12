<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="">
    <!-- component -->
<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
    <header>
        
            <h1 class="text-white text-center">Psicologia CUCEI</h1>
    </header>

    <main class="mt-8">
        <h2 class="mt-6 text-gray-700 dark:text-gray-200">Hola, {{$correo}}</h2>

        <p class="mt-6 leading-loose text-gray-600 dark:text-gray-300">
            ¡Si olvidaset tu contraseña y quieres recuperarla da click en el siguiente botton
        </p>
        <form action="http://localhost:8000/ingresarNuevaPass" method="GET" target="_blank">
            <input type="hidden" name="correo" value="{{$correo}}">> 
            <input type="hidden" name="correo" value="{{$correo}}">
            
        <button class="mt-8 text-white text-xl px-4 py-4 bg-green-500 rounded-xl hover:bg-green-700">Reestablecer contraseña</button>
        </form>
        <p class="mt-20 text-gray-600 dark:text-gray-300">
            Gracias, <br>
            Jesus Renteria, Lider del proyecto 
        </p>
    </main>
    

    <footer class="mt-8 text-center">
        
        <img class="h-16 w-16 mr-2  "src="{{ asset('Imagenes/cerebro.png') }}" alt="cerebro">
        
        <p class="mt-2 text-gray-500 dark:text-gray-400">Ingenieria en computacion</p>

        <p class="mt-6 text-gray-500 dark:text-gray-400">
            Este es un mensaje para <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">{{$correo}}</a>. 
            Correo enviado de manera automatica profavo no contestar a este email.
        </p>

        <p class="mt-3 text-gray-500 dark:text-gray-400">Copyright © 2023 Renteria industries. </p>
    </footer>
</section>
</body>
</html>