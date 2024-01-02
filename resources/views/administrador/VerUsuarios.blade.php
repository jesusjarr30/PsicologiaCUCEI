@extends('layouts.BaseAdmin')

@section('contentAdmin')


<form action="{{ route('guardarHora' ) }}" method="POST">
    @csrf
    @method('put')
    <div>
        
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
        @if ($errors->any())
        <div class="items-center">
        
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4 justify-center items-center">
          <div class="flex items-center">
              <div class="text-red-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  <span class="font-semibold text-red-700">Error!</span>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
              </div>
          </div>
        </div>
      </div>
      @endif
      
      <div class="px-4 sm:px-0 mt-4">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Ver Usuario</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"></p>
      </div>
      
      <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Nombre copleto</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
              <input
                  name="nombre"
                  type="text"
                  readonly
                  class="border-none outline-none bg-transparent w-full"
                  value="{{ $usuario->nombre }}"
                  />
                  <input class="hidden" 
                  name="id"
                  type="text"
                  readonly
                  value={{$usuario->id}}
                  />
            </dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">correo electronico</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
              <label class="rounded-full text-white px-20 py-4 bg-amber-500 ">
                  <strong>
                    {{ $usuario->email }}
                  </strong>
              </label>
        </dd>
            </dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Horas totales</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
              <input
              name="Horas Registradas"
              type="text"
              readonly
              class="border-none outline-none bg-transparent w-full"
              value="{{$horas}}"
              />
        </dd>
            </dd>
          </div>     
        
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Agregar Horas Manual</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 ">
            <input
              name="horas"
              type="text"
              id="horasInput"
              class="border-2 border-gray-300 outline-none bg-transparent w-full"
              
              />
              <script>
                document.getElementById('horasInput').addEventListener('input', function() {
                    // Obtener el valor actual del campo
                    var inputValue = this.value;
            
                    // Validar si el valor contiene solo números
                    if (!/^[0-9]+$/.test(inputValue)) {
                        // Si no es un número, limpiar el valor del campo
                        this.value = inputValue.replace(/[^0-9]/g, '');
                    }
                });
            </script>
      </div>
      
    </div>
  
    <div class="ml-4">
      <a href="{{route('EditUser')}}">
        <button class="px-4 py-2 rounded-full bg-red-600 text-white border-2 border-red-800 hover:bg-red-800"><strong>Cancelar</strong></Button>
      </a>
      <button class="ml-6 px-4 py-2 rounded-full bg-green-600 text-white border-2 border-green-800 hover:bg-green-800"><strong>Guardar</strong></button>
    </div>
  </form>

@endsection