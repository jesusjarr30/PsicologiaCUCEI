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
            Hemos recibido tu solicitud de cita y ya tenemos una fecha para ti. Tu cita es el día {{$fecha}}. 
            Tendrás que presentarte en la parte posterior del módulo L, en la unidad médica. La psicólog@ que atenderá tu 
            caso es {{$psicologoNombre}}. Si tienes algún inconveniente con tu horario o la fecha, recuerda contactarnos. 
            Si necesitas atención inmediata por urgencia, puedes acudir a la unidad para una valoración.
            <br>
            <br>
        </p>
     
        <p class="mt-10 text-gray-600 dark:text-gray-300">
            Gracias, <br>
            Jesus Renteria, Lider del proyecto 
        </p>
    </main>
    

    <footer class="mt-8 text-center">
        
        <img class="h-16 w-16 mr-2  "src="{{ asset('Imagenes/cerebro.png') }}" alt="cerebro">
        
        <p class="mt-2 text-gray-500 dark:text-gray-400">Ingenieria en computacion</p>

        <p class="mt-6 text-gray-500 dark:text-gray-400">
            EL correo de tu Psicolog asigando es el siguiente:<a  class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">{{$psicologoCorreo}}</a>. 
            <br>
            Porfavor no contestes este correo ya que se envia de forma automatica.
        </p>

        <p class="mt-3 text-gray-500 dark:text-gray-400">Copyright © 2023 Renteria industries. </p>
    </footer>
</section>
</body>
</html>