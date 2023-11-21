
@extends('layouts.BasePsicologo')

@section('contentPsicologo')
<form  action="{{ route('GenerarManual') }}" method="POST">
    @csrf
  <div>
      <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Agregar Cita a paciente</h3>
        <input type="hidden" name="usuario_id" value="{{ $user->id }}">
        <input type="hidden" name="pacinete_id" value="{{ $cliente->id }}">
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
                  readonly
                  />
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Apellidos</dt>
            <input
            readonly
                  type="text"
                  name="apellidos"
                  class="border-none outline-none bg-transparent w-full"
                  value="{{ $cliente->apellidos }}"
                  />
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Codigo</dt>
            <input
            readonly
                  type="text"
                  name="codigo"
                  class="border-none outline-none bg-transparent w-full"
                  value="{{ $cliente->codigo }}"
                  />
          </div>
          
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Correo</dt>
            <input
            readonly
            type="text"
            name="correo"
            class="border-none outline-none bg-transparent w-full"
            value="{{ $cliente->correo }}"
            />
          </div>
          <div class="px-4 mt-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Selecione la hora a la cual desea agregar la cita</h3>

            
          </div>
          <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
              <select
              value="{{ old('horario') }}"
                type="time"
                name="horario"
                id="time"
                class="w-3/4 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              >
              <option value="10:00">10:00 am</option>
              <option value="11:00">11:00 am</option>
              <option value="12:00">12:00 pm</option>
              <option value="13:00">01:00 pm</option>
              <option value="14:00">02:00 pm</option>
              <option value="15:00">03:00 pm</option>
              <option value="16:00">04:00 pm</option>
              <option value="17:00">05:00 pm</option>
              <option value="18:00">06:00 pm</option>
              <option value="19:00">07:00 pm</option>
              <option value="20:00">08:00 pm</option>
  
            </select>
            
            </div>
          </div>

        </dl>
      </div>
    </div>
    <div class="ml-4">
      <a href="{{route('AgregarCita',$cliente->id)}}">
        <button form="" class="px-4 py-2 rounded-full bg-red-600 text-white border-2 border-red-800 hover:bg-red-800""><strong>Cancelar</strong></Button>
      </a>
        <button  class="ml-6 px-4 py-2 rounded-full bg-green-600 text-white border-2 border-green-800 hover:bg-green-800"><strong>Generar Cita</strong></button>
    </div>
  
  </form>

@endsection


