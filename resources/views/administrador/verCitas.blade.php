@extends('layouts.BaseAdmin')

@section('contentAdmin')

<div class="mt-4 font-bold text-xl text-center">
    <p class="">
    Citas
    </p>
</div>
<div class="ml-4 m-4 flex">

    <p class="text-gray-600">
    Citas Por atender hoy
    </p>
    <img class="h-12 w-12 flex-none ml-4  bg-gray-50" src="{{ asset('Imagenes/iconos-citas/cita.png') }}" alt="">

</div>

<div class="ml-4">
    @foreach($citasHoy as $cita)

        <ul role="list" class="divide-y divide-gray-100">
            <li class="justify-between gap-x-6 py-5 px-4 hover:bg-violet-300">

            <div class="xl:flex lg:flex md:flex xm:flex-col sx:flex-col  min-w-0 gap-x-4 ml-2 mr-2">
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('Imagenes/iconos-citas/usuario.png') }}" alt="">
                <div class="min-w-0 flex-col">
                <p class="text-sm font-semibold leading-6 text-gray-900">{{$cita->cliente->nombre}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->cliente->apellidos}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->cliente->correo}}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->cliente->telefono}}</p>
                </div>
                <div class="xl:ml-20 lg:ml-20 md:ml-10 ">
                    <p class="text-sm font-semibold leading-6 text-gray-900">horario</p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->fecha}}</p>
                    
                </div>
                <div class="shrink-0 sm:flex sm:flex-col xl:ml-20 lg:ml-20 md:ml-10">
                    <p class="text-sm leading-6 text-gray-900"><strong>Psicologo: </strong> {{$cita->usuario->nombre}}  </p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">{{$cita->usuario->nombre}}</p>
                
                </div>
            </div>
        </ul>
  @endforeach
  
</div>
<div class="ml-4 m-4 flex">

    <p class="text-gray-600">
    Citas proximas
    </p>
    <img class="h-12 w-12 flex-none ml-4  bg-gray-50" src="{{ asset('Imagenes/iconos-citas/calendario.png') }}" alt="">

</div>
<div class="ml-4">
    @foreach($citaPosterior as $cita)

    <ul role="list" class="divide-y divide-gray-100">
        <li class="justify-between gap-x-6 py-5 px-4 hover:bg-orange-300">

        <div class="xl:flex lg:flex md:flex xm:flex-col sx:flex-col  min-w-0 gap-x-4 ml-2 mr-2">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('Imagenes/iconos-citas/usuario.png') }}" alt="">
            <div class="min-w-0 flex-col">
            <p class="text-sm font-semibold leading-6 text-gray-900">{{$cita->cliente->nombre}}</p>
            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->cliente->apellidos}}</p>
            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->cliente->correo}}</p>
            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->cliente->telefono}}</p>
            </div>
            <div class="xl:ml-20 lg:ml-20 md:ml-10 ">
                <p class="text-sm font-semibold leading-6 text-gray-900">horario</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$cita->fecha}}</p>
                
            </div>
            <div class="shrink-0 sm:flex sm:flex-col xl:ml-20 lg:ml-20 md:ml-10">
                <p class="text-sm leading-6 text-gray-900"><strong>Psicologo: </strong> {{$cita->usuario->nombre}}  </p>
                <p class="mt-1 text-xs leading-5 text-gray-500">{{$cita->usuario->nombre}}</p>
            
            </div>
        </div>
    </ul>
  @endforeach
  
</div>
  
@endsection