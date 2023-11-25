

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
  
    <div class="flex items-center justify-center p-12">
      <form action="{{ route('guardar-cita') }}" method="POST">
        @csrf
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
          value="{{ old('nombre') }}"
          
       
          placeholder="Nombre"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
        @error('nombre')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">Nombre requerido.</p>
              </div>
          </div>
      </div>
        @enderror
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
          value="{{ old('apellidos') }}"
          
          placeholder="Apellidos"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            @error('apellidos')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">Apellidos Requerido.</p>
              </div>
          </div>
      </div>
        @enderror
          </div>
        </div>
        
          </div>
      <div>
      <label
          
          class=" mb-3 block text-base font-medium text-[#07074D]"
        >Codigo</label>
        <input
          type="text"
          name="codigo"
          value="{{ old('codigo') }}"
          placeholder="Codigo de estudiante"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
        @error('codigo')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">codigo numerico de 8 a 12 digitos</p>
              </div>
          </div>
      </div>
        @enderror

    </div>
   
    <div class="mt-2">
      <label
          
          class="mt-2 mb-3 block text-base font-medium text-[#07074D]"
        >Correo</label>
        <input
          type="text"
          name="correo"
          value="{{ old('correo') }}"
          placeholder="Institucional o personal"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
        @error('correo')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">correo no valido</p>
              </div>
          </div>
      </div>
        @enderror

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
          value="{{ old('edad') }}"
          placeholder="Solo numeros"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
          @error('edad')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">Edad no valida</p>
              </div>
          </div>
      </div>
        @enderror
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
          value="{{ old('telefono') }}"
          placeholder="Celular o casa"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            @error('telefono')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">telefono no valido</p>
              </div>
          </div>
      </div>
        @enderror
          </div>
        </div>
    
   
      <div class="mb-5">
        <label
          class="mb-3 block text-base font-medium text-[#07074D]"
          
        >
        Describa de manera breve cual es el motivo por el cual solicita apoyo del programa de psicología
        </label>
        <textarea
          type="text"
          name="descripcion"
          placeholder="Describa brevemente la situación por la cual está atravesando."
          rows="4" 
          class="w-full h-40 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          >{{ old('descripcion') }}</textarea>
          @error('descripcion')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">tiene que ser menor a 255 caracteres</p>
              </div>
          </div>
      </div>
        @enderror
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
          name="expectativas"
          placeholder="Describa brevemente la situación por la cual está atravesando."
          rows="4" 
          class="w-full h-40 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          >{{ old('expectativas')}}</textarea>
          @error('expectativas')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">tiene que ser menot a 260 caracteeres</p>
              </div>
          </div>
      </div>
        @enderror
      </div>

      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Fecha nacimeinto 
            </label>
            <input
            value="{{ old('nacimiento') }}"
              type="date"
              name="nacimiento"
              id="date"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
            @error('nacimiento')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">ingrese una fecha valida</p>
              </div>
          </div>
      </div>
        @enderror
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="time"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
            ¿En que horario podrías acudir a las sesiones de acompañamiento Psicológico? (Considera que las sesiones tienen una duración de 50 minutos y se realizan una vez a la semana)
            </label>
            <select
            value="{{ old('horario') }}"
              type="time"
              name="horario"
              id="time"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            >
            <option value="10:00">08:00 am</option>
            <option value="10:00">09:00 am</option>
            <option value="10:00">10:00 am</option>
            <option value="11:00">11:00 am</option>
            <option value="12:00">12:00 pm</option>
            <option value="13:00">01:00 pm</option>
            <option value="14:00">02:00 pm</option>
            <option value="15:00">03:00 pm</option>
            <option value="16:00">04:00 pm</option>
            <option value="17:00">05:00 pm</option>
            <option value="18:00">06:00 pm</option>
            

          </select>
          @error('horario')
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  
                  <p class="text-sm text-red-700">tiene que ser menot a 260 caracteeres</p>
              </div>
          </div>
      </div>
        @enderror
          </div>
        </div>
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
              
              class="pl-3 text-base font-medium text-[#07074D]"
            >
              Si
            </label>
          </div>
          
        </div>
      </div>

      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
          type = "subtmit"
        >
          Registrar
        </button>
      </div>
    </div>
  </form>
  </div>

    </body>
</html>
