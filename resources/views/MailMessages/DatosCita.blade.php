<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Eliminado el enlace a Taiwind CSS -->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Documento</title>
        <style>
            /* Estilos CSS en línea para replicar los estilos de Tailwind CSS */
            body {
                margin: 0;
                padding: 0;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #1f2937;
                text-align: left;
                background-color: #fff;
            }
    
            section {
                max-width: 2xl;
                padding: 6px;
                margin: auto;
                background-color: #111827;
            }
    
            header {
                text-align: center;
            }
    
            h1 {
                color: white;
            }
    
            main {
                margin-top: 8px;
            }
    
            h2 {
                margin-top: 6px;
                color: white;
            }
    
            p {
                margin-top: 6px;
                line-height: loose;
                color: white;
            }
    
            form {
                margin-top: 8px;
            }
    
            button {
                margin-top: 8px;
                color: white;
                font-size: 1.25rem; /* Equivalente a text-xl en Tailwind CSS */
                padding: 16px 24px; /* Equivalente a px-4 py-4 en Tailwind CSS */
                background-color: #16a34a; /* Equivalente a bg-green-500 en Tailwind CSS */
                border-radius: 0.75rem; /* Equivalente a rounded-xl en Tailwind CSS */
                transition: background-color 0.3s ease; 
            }
            .button-reset-password:hover {
                background-color: #166534; /* Equivalente a hover:bg-green-700 en Tailwind CSS */
    }
    
            footer {
                margin-top: 8px;
                text-align: center;
            }
    
            img {
                height: 56px;
                width: 56px;
                margin-right: 2px;
            }
    
            p {
                margin-top: 2px;
                color: white;
            }
    
            a {
                color: white;
                color: #3b82f6;
                text-decoration: underline;
                hover: #2563eb;
            }
    
            p {
                margin-top: 6px;
                color: white;
            }
    
            p {
                margin-top: 3px;
                color: white;
            }
            .mx-auto{
                margin-left: auto;
                margin-right: auto;
                width: 46rem;
            }
        </style>
    </head>
<body class="">
    <!-- component -->
<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
    <header>
        
            <h1 class="text-white text-center">Psicologia CUCEI</h1>
        
    </header>

    <main class="mt-8">
        @php
            setlocale(LC_TIME, 'es_VE.UTF-8','esp');
            $marca = strtotime($fecha);
            $hoy =  date('Y-m-d H:i:s', time());
            $fechaLimite = strtotime(date("Y-m-d H:i:s", strtotime( $hoy.'+1 day' )) );
        @endphp
        <p class="mt-6 leading-loose text-gray-600 dark:text-gray-300">
            Buenos dias, te escribimos del programa de Psicologia de la Unidad de Salud Interal-Cucei.
            Contamos con un espacio disponibloe para que inicies tu acompañamiento los dias 
            @php 
             echo strftime('%A a las %R', $marca) ; /* dia de la semana*/
            @endphp.
            Estarias Iniciando el 
            @php 
             echo strftime('%d de %B del %Y', $marca);  /*Fecha inicial*/
            @endphp.
            <br>
            <br>
            De estar interesado, te pedimos nos respondas de 
            <span class="font-bold">"infomado y de acuerdo con el dia y horario"</span>
            mas tardar a las 15:00 hrs el 
            @php 
             echo strftime('%d %B %Y.', $fechaLimite); /*Fecha limite de respuesta*/
            @endphp
            Para que quede registrada tu cita formalmente en la agenda.
            <br>
            <br>
            Tendrás que presentarte en la parte posterior del módulo L, en la unidad médica. La psicólog@ que atenderá tu 
            caso es {{$psicologoNombre}}. Si tienes algún inconveniente con tu horario o la fecha, recuerda contactarnos. 
            Si necesitas atención inmediata por urgencia, puedes acudir a la unidad para una valoración.
            <br>
            Saludos.

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