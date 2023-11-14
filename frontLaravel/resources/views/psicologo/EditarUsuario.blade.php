@extends('layouts.BasePsicologo')

@section('contentPsicologo')

<form action="{{ route('editar-usuario' ) }}" method="POST">
  @csrf
  @method('put')
  <div>
    
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
                value="{{ Auth::user()->nombre }}"
                />
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">correo electronico</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
            <label class="rounded-full text-white px-20 py-4 bg-amber-500 ">
                <strong>
                  {{ Auth::user()->email }}
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
            value="{{ Auth::user()->telefono }}"
            />
      </dd>
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Role</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 ">
             <label class=" rounded-full text-white px-8 py-4 bg-blue-400 "> <strong>{{ Auth::user()->role }} </strong></label></dd>
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
                        <option value="{{json_decode( Auth::user()->horario)->Lun_I}}">
                          {{json_decode( Auth::user()->horario)->Lun_I}} Actual</option>

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
                        name="Lun-horario-Final"
                        id="time"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        >
                        <option value="{{json_decode( Auth::user()->horario)->Lun_F}}">
                          {{json_decode( Auth::user()->horario)->Lun_F}} Actual</option>
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

                  Mar
                  <div class="ml-4 flex min-w-0 flex-1 gap-2">
                    <select
                        type="time"
                        name="Mar-horario-Inicio"
                        id="time"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        >
                        <option value="{{json_decode( Auth::user()->horario)->Mar_I}}">
                          {{json_decode( Auth::user()->horario)->Mar_I}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Mar_F}}">
                          {{json_decode( Auth::user()->horario)->Mar_F}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Mie_I}}">
                          {{json_decode( Auth::user()->horario)->Mie_I}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Mie_F}}">
                          {{json_decode( Auth::user()->horario)->Mie_F}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Jue_I}}">
                          {{json_decode( Auth::user()->horario)->Jue_I}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Jue_F}}">
                          {{json_decode( Auth::user()->horario)->Jue_F}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Vie_I}}">
                          {{json_decode( Auth::user()->horario)->Vie_I}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Vie_F}}">
                          {{json_decode( Auth::user()->horario)->Vie_F}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Sab_I}}">
                          {{json_decode( Auth::user()->horario)->Sab_I}} Actual</option>
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
                        <option value="{{json_decode( Auth::user()->horario)->Sab_F}}">
                          {{json_decode( Auth::user()->horario)->Sab_F}} Actual</option>
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