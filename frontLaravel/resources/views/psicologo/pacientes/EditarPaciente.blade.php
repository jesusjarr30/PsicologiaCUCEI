@extends('layouts.BasePsicologo')

@section('contentPsicologo')
<form  action="{{ route('actualizar-PacientePSI', $cliente->id ) }}" method="POST">
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
      
      <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Pacientes</h3>
        <p {class}="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Editar pacientes</p>
      </div>
      <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Nombre</dt>
            <input
                  type="text"
                  name="nombre"
                  class="border-none outline-none bg-transparent w-full"
                  value="{{ $cliente->nombre }}"
                  />
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Apellidos</dt>
            <input
                  type="text"
                  name="apellidos"
                  class="border-none outline-none bg-transparent w-full"
                  value="{{ $cliente->apellidos }}"
                  />
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Codigo</dt>
            <input
                  type="text"
                  name="codigo"
                  class="border-none outline-none bg-transparent w-full"
                  value="{{ $cliente->codigo }}"
                  />
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Edad</dt>
            <input
                  type="text"
                  name="edad"
                  class="border-none outline-none bg-transparent w-full"
                  value="{{ $cliente->edad }}"
                  />
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Correo</dt>
            <input
            type="text"
            name="correo"
            class="border-none outline-none bg-transparent w-full"
            value="{{ $cliente->correo }}"
            />
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Telefono</dt>
              <input
              type="text"
              name="telefono"
              class="border-none outline-none bg-transparent w-full"
              value="{{ $cliente->telefono }}"
              />
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Nacimiento</dt>
              <input
                type="date"
                name="nacimiento"
                id="date"
                value="{{ $cliente->nacimiento }}"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              />
            </div>
          
        </dl>
      </div>
    </div>
    <div class="ml-4">
      <a href="{{route('showPacienteEditar',$cliente->id)}}">
        <button form="" class="px-4 py-2 rounded-full bg-red-600 text-white border-2 border-red-800 hover:bg-red-800""><strong>Cancelar</strong></Button>
      </a>
        <button  class="ml-6 px-4 py-2 rounded-full bg-green-600 text-white border-2 border-green-800 hover:bg-green-800"><strong>Guardar</strong></button>
    </div>
  
  </form>

@endsection