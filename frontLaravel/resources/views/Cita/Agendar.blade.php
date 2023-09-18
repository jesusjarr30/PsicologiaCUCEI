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
 
  <div class="mx-auto w-full max-w-[550px]">
    


      <div class="-mx-3 flex flex-wrap">
      <div class="mb-5 flex">
  <div class="w-1/2 mr-4">
    <label
      for="fName"
      class="mb-3 block text-base font-medium text-[#07074D]"
    >
      Nombre
    </label>
    <input
      type="text"
      name="fName"
      id="fName"
      placeholder="First Name"
      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
    />
  </div>
  <div class="w-1/2">
    <label
      for="lName"
      class="mb-3 block text-base font-medium text-[#07074D]"
    >
      Apellidos
    </label>
    <input
      type="text"
      name="lName"
      id="lName"
      placeholder="Last Name"
      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
    />
  </div>
</div>

      </div>
      <div class="mb-5">
        <label
          for="guest"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          ¿Por que quiere una cita con un psicologo?
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
              name="date"
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

      <div class="mb-5">
        <label class="mb-3 block text-base font-medium text-[#07074D]">
          Que tipo de cita busca?
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
              Presencial
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
              Remota
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
</div>

    </body>
</html>