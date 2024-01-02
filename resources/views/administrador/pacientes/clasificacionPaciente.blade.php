@extends('layouts.BaseAdmin')

@section('contentAdmin')

<div class="mt-4 font-bold text-xl text-center">
    <p class="">
    Citas por clasificar
    </p>
</div>
<div class="ml-4 m-4 flex">

    <p class="text-gray-600">
    Clientes por clasificar
    </p>
    <img class="h-12 w-12 flex-none ml-4  bg-gray-50" src="{{ asset('Imagenes/iconos-citas/cita.png') }}" alt="">

</div>

<div class="ml-4">
    @foreach($clasificar as $cita)
    <form method="POST" action="{{ route('ClasificarCli') }}">
        @csrf
        @method('PUT')

        <ul role="list" class="divide-y divide-gray-100">
            <li class="justify-between gap-x-6 py-5 px-4 hover:bg-violet-300">

            <div class="xl:flex lg:flex md:flex xm:flex-col sx:flex-col  min-w-0 gap-x-4 ml-2 mr-2">
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('Imagenes/iconos-citas/usuario.png') }}" alt="">
                <div class="min-w-0 flex-col">
                <p class="text-sm font-semibold leading-6 text-gray-900">{{$cita->nombre}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->apellidos}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->correo}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->telefono}}</p>

                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Codigo: {{$cita->codigo}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Edad: {{$cita->edad}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Nacimiento: {{$cita->nacimiento}}</p>
                </div>
                <div class="shrink-0 sm:flex sm:flex-col xl:ml-20 lg:ml-20 md:ml-10 ">
                    <p class="text-sm font-semibold leading-6 text-gray-900">Horario Preferido: </p>
                    @php
                        $horario = json_decode($cita->horario);
                    @endphp
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Lunes: {{$horario->Lun}} </p> 
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Martes: {{$horario->Mar}} </p> 
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Miercoles: {{$horario->Mie}} </p> 
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Jueves: {{$horario->Jue}} </p> 
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Viernes: {{$horario->Vie}} </p> 

                </div>
                <div class="shrink-0 sm:flex sm:flex-col xl:ml-20 lg:ml-20 md:ml-10">
                    <p class="text-sm leading-6 text-gray-900"><strong>Descripcion: </strong>  </p>
                    <div class="mt-1 text-xs leading-5 text-gray-500">
                        @php
                        
                            $wrappedDescription = wordwrap($cita->descripcion, 50, "\n", true);
                            @endphp
                            {!! nl2br(e($wrappedDescription)) !!}
                    </div>
                
                </div>
                <div class="shrink-0 sm:flex sm:flex-col xl:ml-20 lg:ml-20 md:ml-10">
                    <p class="text-sm leading-6 text-gray-900"><strong>Expectativas: </strong></p>
                    <div class="mt-1 text-xs leading-5 text-gray-500">
                        @php
                        
                            $wrappedDescription = wordwrap($cita->expectativas, 50, "\n", true);
                            @endphp
                            {!! nl2br(e($wrappedDescription)) !!}
                    </div>
                </div>
                <div class="xl:ml-10 lg:ml-10 md:ml-5 ">
                    <p class="text-sm leading-6 text-gray-900"><strong>clasificar:</strong></p>
                    <select
                    value="{{ old('horario') }}"
                      name="clasificar"
                      id="clasificar"
                      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    >
                    <option value="">N/A</option>
                    <option value="depresion">Depresión</option>
                    <option value="ansiedad">Ansiedad</option>
                    <option value="suicidio">Suicidio</option>
                    <option value="otros">otros</option>
        
                  </select>
                  <label
          
                  class="mb-3 block text-base font-medium text-[#07074D]"
                >
                  Numero de secciones
                </label>
                <input
                  type="text"
                  name="secciones"
                  placeholder="Solo numeros"
                  oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                  />
                <input class="hidden" name=id value={{$cita->id}}/>
                    
                </div>
                <div class="xl:ml-10 lg:ml-00 md:ml-5 ">
                    
                    <button type="submit"
                     class="mt-4 px-4 py-4 rounded-md font-bold bg-green-600 text-white
                      hover:bg-green-800">Guardar</button>
                    
                </div>
            </div>
            @if($errors->any())
            <div class="alert alert-success">
        
                
                <div class="bg-green-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
                  <div class="flex items-center">
                      <div class="text-red-700">
                          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                      </div>
                      <div class="mx-3">
                          <span class="font-semibold text-red-700">Error!</span>
                          <p class="text-sm text-red-700">Favor de llenar los campose necesarios </p>
                      </div>
                  </div>
              </div>
            </div>
            @endif
        </ul>

    </form>
  @endforeach
</div>
@endsection