@extends('layouts.BaseAdmin')

@section('contentAdmin')


<form action="{{ route('editar-usuario2' ) }}" method="POST">
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
        <h3 class="text-base font-semibold leading-7 text-gray-900">Editar usuario</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Puedes modificar todos los campos que se requieran</p>
      </div>
      
      <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Nombre copleto</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
              <input
                  name="nombre"
                  type="text"
                  class="border-none outline-none bg-transparent w-full"
                  value="{{ $usuario->nombre }}"
                  />
                  <input class="hidden" 
                  name="id"
                  type="text"
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
            <dt class="text-sm font-medium leading-6 text-gray-900">telefono</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
              <input
              name="telefono"
              type="text"
              class="border-none outline-none bg-transparent w-full"
              value="{{ $usuario->telefono }}"
              />
        </dd>
            </dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Role</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 ">
               <label class=" rounded-full text-white px-8 py-4 bg-blue-400 "> <strong>{{ $usuario->role }} </strong></label></dd>
          </div>
  
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">Cambiar contraseña</dt>
              <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                  
                  <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                    <div class="flex w-0 flex-1 items-center">
    
                      
                      <div class="ml-4 flex min-w-0 flex-1 gap-2">
                          <input
                          name="password_Old"
                          type="password"
                          class="border-2 rounded-md bg-transparent w-full border-blue-600"
                          value=""
                          placeholder="Ingresa tu contraseña actual"
                          />
                      </div>
                    </div>                
                  </li>
                  <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                      <div class="flex w-0 flex-1 items-center">
  
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                            <input
                            name="password"
                            type="password"
                            class="border-2 rounded-md bg-transparent w-full border-blue-600"
                            value=""
                            placeholder="Ingresa nueva contraseña"
                            />
                        </div>
                      </div>                
                    </li>
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                      <div class="flex w-0 flex-1 items-center">
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                            <input
                            name="password_confirmation"
                            type="password"
                            class="border-2 rounded-md bg-transparent w-full border-blue-600"
                            value=""
                            placeholder="Confirmar contraseña"
                            />
                        </div>
                      </div>                
                    </li>
  
              </ul>
          </dd>
          </div>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-900">Horario laboral</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
  
                    Lun
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <select
                          type="time"
                          name="Lun-horario-Inicio"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                            <option value="{{json_decode( $usuario->horario)->Lun_I}}">
                              {{json_decode( $usuario->horario)->Lun_I}} Actual</option>
                          @else
                            <option value="--:--">Inicio</option>
                          @endif
                          <option value="00:00">Sin asignar</option>
                          <option value="08:00">08:00 am</option>
                          <option value="09:00">09:00 am</option>
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
                      <select
                          type="time"
                          name="Lun-horario-Final"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                            <option value="{{json_decode( $usuario->horario)->Lun_F}}">
                              {{json_decode( $usuario->horario)->Lun_F}} Actual</option>
                          @else
                            <option value="--:--">Final</option>
                          @endif
                          <option value="00:00">Sin asignar</option>
                          <option value="08:00">08:00 am</option>
                          <option value="09:00">09:00 am</option>
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
                    </div>
                  </div>                
                </li>
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
  
                    Mar
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <select
                          type="time"
                          name="Mar-horario-Inicio"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Mar_I}}">
                            {{json_decode( $usuario->horario)->Mar_I}} Actual</option>
                          @else
                            <option value="--:--">Inicio</option>
                          @endif
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
                      <select
                          type="time"
                          name="Mar-horario-Final"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Mar_F}}">
                            {{json_decode( $usuario->horario)->Mar_F}} Actual</option>
                          @else
                            <option value="--:--">Final</option>
                          @endif
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
                </li>
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
  
                    Mie
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <select
                          type="time"
                          name="Mie-horario-Inicio"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Mie_I}}">
                            {{json_decode( $usuario->horario)->Mie_I}} Actual</option>
                          @else
                            <option value="--:--">Inicio</option>
                          @endif
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
                      <select
                          type="time"
                          name="Mie-horario-Final"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Mie_F}}">
                            {{json_decode( $usuario->horario)->Mie_F}} Actual</option>
                          @else
                            <option value="--:--">Final</option>
                          @endif
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
                </li>
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
  
                    Jue
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <select
                          type="time"
                          name="Jue-horario-Inicio"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Jue_I}}">
                            {{json_decode( $usuario->horario)->Jue_I}} Actual</option>
                          @else
                            <option value="--:--">Inicio</option>
                          @endif
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
                      <select
                          type="time"
                          name="Jue-horario-Final"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode($usuario->horario)->Jue_F}}">
                            {{json_decode( $usuario->horario)->Jue_F}} Actual</option>
                          @else
                            <option value="--:--">Final</option>
                          @endif
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
                </li>
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
  
                    Vie
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <select
                          type="time"
                          name="Vie-horario-Inicio"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Vie_I}}">
                            {{json_decode( $usuario->horario)->Vie_I}} Actual</option>
                          @else
                            <option value="--:--">Inicio</option>
                          @endif
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
                      <select
                          type="time"
                          name="Vie-horario-Final"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Vie_F}}">
                            {{json_decode( $usuario->horario)->Vie_F}} Actual</option>
                          @else
                            <option value="--:--">Final</option>
                          @endif
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
                </li>
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
  
                    Sab
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <select
                          type="time"
                          name="Sab-horario-Inicio"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Sab_I}}">
                            {{json_decode( $usuario->horario)->Sab_I}} Actual</option>
                          @else
                            <option value="--:--">Inicio</option>
                          @endif
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
                      <select
                          type="time"
                          name="Sab-horario-Final"
                          id="time"
                          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                          >
                          @if ( $usuario->horario != null)
                          <option value="{{json_decode( $usuario->horario)->Sab_F}}">
                            {{json_decode( $usuario->horario)->Sab_F}} Actual</option>
                          @else
                            <option value="--:--">Final</option>
                          @endif
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
                </li>
  
              </ul>
            </dd>
          </div>
        </dl>
      </div>
      
    </div>
  
    <div class="ml-4">
      <a href="{{route('EditUser')}}">
        <button form="" class="px-4 py-2 rounded-full bg-red-600 text-white border-2 border-red-800 hover:bg-red-800"><strong>Cancelar</strong></Button>
      </a>
      <button class="ml-6 px-4 py-2 rounded-full bg-green-600 text-white border-2 border-green-800 hover:bg-green-800"><strong>Guardar</strong></button>
    </div>
  </form>

@endsection