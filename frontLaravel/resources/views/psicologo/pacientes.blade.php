@extends('layouts.BasePsicologo')

@section('contentPsicologo')

<div class="p-5 h-screen bg-gray-100">
    <h1 class="text-4xl mb-2"> Lista de Pacientes</h1>
    <div>
        <input placeholder="Nombre" class="block p-2 text-xl rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"/>
    </div>
    <div class="overflow-auto rounded-lg shadow hidden md:block mt-6">

        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 borde-gray-200">
                <tr>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">Nombre</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">codigo</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">correo</th>
                    <th class="w-10 p-3 text-sm font-sm font-semibold tracking-wide text-left">edad</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">telefono</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 ">
                @php
                    $rowColor = 'bg-white'; // Inicialmente, la primera fila es blanca
                @endphp
                @foreach($pacientes as $Paciente)
                <tr class="{{ $rowColor }}">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Paciente->nombre }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Paciente->codigo }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Paciente->correo }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$Paciente->edad}}
                    </td>
                    
                    <td class="flex"> 
                        
                        <a href="{{ route('verNotasPSI', ['id' => $Paciente->id]) }}" class="mr-2 mt-2 border border-green-800
                             bg-green-800 rounded-lg w-16 text-white hover:bg-green-500">Notas</a>
                        
                           
                        <a href="{{ route('showPacienteEditarPSI', ['id' => $Paciente->id]) }}" class="mr-2 mt-2 border border-yellow-800 bg-yellow-800 rounded-lg w-16 text-white hover:bg-yellow-500">Editar</a>
                        <a href="" class="mr-2 mt-2 border border-red-800
                             bg-red-800 rounded-lg w-16 text-white hover:bg-red-500">Eliminar</a>
                    </td>
                </tr>
                @php
                // Cambia el color de la fila para la siguiente iteración
                $rowColor = ($rowColor === 'bg-white') ? 'bg-gray-200' : 'bg-white';
            @endphp
                @endforeach

            </tbody>

        </table>
        <div class="pagination mt-4">
            {{ $pacientes->links() }}
        </div>
        
    </div>
    <!-- Aqui va lo de movil devices. -->
    <div class="mt-3 grid grid-cols-1 gap-4 md:hidden">
        <div class>
            @foreach($pacientes as $Paciente)
            <div class="bg-white space-y-3 p-4 rounded-lg shadow mb-4">
                <div>{{ $Paciente->nombre }}</div>
                <div>{{ $Paciente->correo }}</div>
                <div>tel: {{ $Paciente->telefono }}</div>
                
                <div class="flex">
                    <button class="mr-2 mt-2 border border-green-800 bg-green-800 rounded-lg w-20 text-white hover:bg-green-500">Ver</button>
                    <button class="mr-2 mt-2 border border-yellow-800 bg-yellow-800 rounded-lg w-20 text-white hover:bg-yellow-500">Editar<button>
                    <button class="mr-2 mt-2 border border-red-800 bg-red-800 rounded-lg w-16 text-white hover:bg-red-500">Eliminar<button>
                        
                </div>
            </div>
            
            @endforeach
            <div class="pagination mt-4">
                {{ $pacientes->links() }}
            </div>

        </div>
    </div>

</div>

@endsection