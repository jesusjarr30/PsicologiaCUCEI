@extends('layouts.BaseAdmin')

@section('contentAdmin')

<div class="p-5 h-screen bg-gray-100">
    <h1 class="text-4xl mb-2"> Lista de usuarios</h1>
    <div>
        <input />
    </div>
    <div class="overflow-auto rounded-lg shadow hidden md:block">

        <table class="w-full ">
            <thead class="bg-gray-50 border-b-2 borde-gray-200">
                <tr>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">Nombre</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">email</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">telefono</th>
                    <th class="w-10 p-3 text-sm font-sm font-semibold tracking-wide text-left">role</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">horario</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">activo</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 ">
                @php
                    $rowColor = 'bg-white'; // Inicialmente, la primera fila es blanca
                @endphp
                @foreach($usuarios as $Usuario)
                <tr class="{{ $rowColor }}">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Usuario->nombre }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Usuario->email }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Usuario->telefono }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        <span class="whitespace-nowrap py-1.5 p-1.5 text-xs font-medium uppercase tracking-wider rounded-lg @if($Usuario->role === 'ADMIN') px-3.5 text-blue-800 bg-blue-200 @else px-5 text-red-800 bg-red-200 @endif">{{ $Usuario->role }}</span>

                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Usuario->horario }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Usuario->activo }}</td>
                </tr>
                @php
                // Cambia el color de la fila para la siguiente iteración
                $rowColor = ($rowColor === 'bg-white') ? 'bg-gray-200' : 'bg-white';
            @endphp
                @endforeach

            </tbody>

        </table>
    </div>
    <!-- Aqui va lo de movil devices. -->
    <div class="mt-3 grid grid-cols-1 gap-4 md:hidden">
        <div class >
            <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                <div>Nombre</div>
                <div>Email</div>
                    <div>Telefono</div>
                <div class="flex items-center space-x-2 text-sm">
                    <div>role</div>
                    <div>horario</div>
                    <div>activo</div>
                </div>
            </div>

        </div>
    </div>

</div>


@endsection