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
    <body >
    <div class="flex items-center justify-center p-12">
      <form action="" method="POST">
      <div class="mx-auto w-full max-w-[550px]">
    


      <div class=" flex flex-wrap">
      <div class="mb-5 flex">
        
        
      <div class="w-1/2 mr-4">
        <label
    
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Nombre
        </label>
        <input
          type="text"
          name="nombre"
       
          placeholder="Nombre"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
      </div>
      <div class="w-1/2">
        <label
        
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Apellidos
        </label>
        <input
          type="text"
          name="apellidos"
          
          placeholder="Apellidos"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
        </div>
          </div>
      <div>
      <label
          
          class="mb-3 block text-base font-medium text-[#07074D]"
        >Codigo</label>
        <input
          type="text"
          name="codigo"
          
          placeholder="Codigo de estudiante"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />

    </div>
   
    <div>
      <label
          
          class="mb-3 block text-base font-medium text-[#07074D]"
        >Correo</label>
        <input
          type="text"
          name="correo"
         
          placeholder="Institucional o personal"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />

    </div>
    <div class="mb-5 flex">
      <div class="w-1/2 mr-4">
        <label
          
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Edad
        </label>
        <input
          type="text"
          name="edad"
         
          placeholder="Solo numeros"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
      </div>
      <div class="w-1/2">
        <label
          
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Telefono
        </label>
        <input
          type="text"
          name="telefono"
    
          placeholder="Celular o casa"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
        </div>
    
   
      <div class="mb-5">
        <label
          for="guest"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
        Describa de manera breve cual es el motivo por el cual solicita apoyo del programa de psicología
        </label>
        <textarea
          type="text"
          name="guest"
          id="guest"
          placeholder="Describa brevemente la situación por la cual está atravesando."
          rows="4" 
          class="w-full h-40 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          ></textarea>
      </div>
      <div class="mb-5">
        <label
          for="guest"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
        ¿Qué esperas de las sesiones de acompañamiento? (¿Cuáles son tus expectativas?)
        </label>
        <textarea
          type="text"
          name="guest"
          id="guest"
          placeholder="Describa brevemente la situación por la cual está atravesando."
          rows="4" 
          class="w-full h-40 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          ></textarea>
      </div>

      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="date"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Fecha nacimeinto 
            </label>
            <input
              type="date"
              name="nacimiento"
              id="date"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="time"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Hora
            </label>
            <input
              type="time"
              name="time"
              id="time"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
        </div>
      </div>
      <div>
      <label
          
          class="mb-3 block text-base font-medium text-[#07074D]"
        >¿En que horario podrías acudir a las sesiones de acompañamiento Psicológico? (Considera que las sesiones tienen una duración de 50 minutos y se realizan una vez a la semana) </label>
        <input
          type="text"
          name="fName"
          id="fName"
          placeholder="First Name"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />

    </div>

    <div>
      <label
          class="mb-3 mt-8 block text-base font-medium text-[#07074D]"
        >AVISO DE CONFIDENCIALIDAD <br> <br>La universidad de Guadalajara (en adelante U de G), con domicilio en Avenida Juárez 976, colonia Centro, código postal44100, en Guadalajara, Jalisco, hace de su conocimiento que se coonsiderará como información confidencial aquella quese encuentre contemplada en los artículos 3, fracción IX y X de la LPDPPSOEMJ; 21 de la LTAIPEJM; LineamientosCuadragésimo Octavo y Cuadragésimo Noveno de los lineamientos de clasificación; lineamientos Décimo Sexto, Décimoséptimo y Quincuagésimo octavo de los lineamientos de protección, así como aquellos datos de una persona físicaidentificada o identificable y la inherente a las personas jurídicas, los cuales podrán ser sometidos a tratamiento y seránúnica y exclusivamente utilizados para los fines que fueron proporcionados, de acuerdo con las finalidades yatribuciones establecidas en los artículos 1,5 y de la Ley Orgánica, así como 2 y 3 del Estatuto General, ambaslegislaciones de la U de G, de forma, para la prestación de los servicios que la misma ofrece conforme a las facultades yprerrogativas de la entidad universitaria correspondiente y estarán a resguardo y protección de la misma.Usted puede consultar nuestro aviso de privacidad integral en la siguiente página web:http://www.transparencia.udg.mx/aviso-confidencialidad-integral </label>
         
    </div>

      <div class="mb-5">
        <label class="mb-3 block text-base font-medium text-[#07074D]">
          ¿Estoy de acuerdo con el aviso de confidencialidad?
        </label>
        <div class="flex items-center space-x-6">
          <div class="flex items-center">
            <input
              type="radio"
              name="radio1"
              id="radioButton1"
              class="h-5 w-5"
            />
            <label
              for="radioButton1"
              class="pl-3 text-base font-medium text-[#07074D]"
            >
              Si
            </label>
          </div>
          <div class="flex items-center">
            <input
              type="radio"
              name="radio1"
              id="radioButton2"
              class="h-5 w-5"
            />
            <label
              for="radioButton2"
              class="pl-3 text-base font-medium text-[#07074D]"
            >
              No
            </label>
          </div>
        </div>
      </div>

      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
        >
          Registrar
        </button>
      </div>
    </div>
  </form>
  </div>

    </body>
</html>