@extends('layouts.BaseAdmin')

@section('contentAdmin')

<div class="p-5 h-screen bg-gray-100">
    <h1 class="text-4xl mb-2"> Lista de usuarios</h1>
    <div>
        <div class="flex">

            <form id="form1" action="{{route('searchDataUsuario')}}" method="GET">
                @csrf
                <input placeholder="Nombre" name="search" class=" mr-4 mt-2 p-2 text-xl rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"/>
            </form>
            <button form="form1" type="submit" class="mr-2 mt-2 border border-blue-800 bg-blue-800 rounded-lg w-20 text-white hover:bg-blue-500"> Buscar</button>
        </div>    </div>
    <div class="overflow-auto rounded-lg shadow hidden md:block mt-6">

        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 borde-gray-200">
                <tr>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">Nombre</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">email</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">telefono</th>
                    <th class="w-10 p-3 text-sm font-sm font-semibold tracking-wide text-left">role</th>
                    
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">Acciones</th>
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
                    
                    <td class="flex"> 
                        <button class="mr-2 mt-2 border border-green-800 bg-green-800 rounded-lg w-16 text-white hover:bg-green-500">Ver</button>
                        <button class="mr-2 mt-2 border border-yellow-800 bg-yellow-800 rounded-lg w-16 text-white hover:bg-yellow-500">Editar<button>
                        <button class="mr-2 mt-2 border border-red-800 bg-red-800 rounded-lg w-16 text-white hover:bg-red-500">Eliminar<button>


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
            {{ $usuarios->links() }}
        </div>
        
    </div>
    <!-- Aqui va lo de movil devices. -->
    <div class="mt-3 grid grid-cols-1 gap-4 md:hidden">
        <div class>
            @foreach($usuarios as $Usuario)
            <div class="bg-white space-y-3 p-4 rounded-lg shadow mb-4">
                <div>{{ $Usuario->nombre }}</div>
                <div>{{ $Usuario->email }}</div>
                <div>tel: {{ $Usuario->telefono }}</div>
                <div class="flex items-center space-x-2 text-sm">
                    <div>
                        <span class="whitespace-nowrap py-1.5 p-1.5 text-xs font-medium uppercase tracking-wider rounded-lg @if($Usuario->role === 'ADMIN') px-3.5 text-blue-800 bg-blue-200 @else px-5 text-red-800 bg-red-200 @endif">{{ $Usuario->role }}</span>

                    </div>
                    
                  
                </div>
                <div class="flex">
                    <button class="mr-2 mt-2 border border-green-800 bg-green-800 rounded-lg w-20 text-white hover:bg-green-500">Ver</button>
                    <button class="mr-2 mt-2 border border-yellow-800 bg-yellow-800 rounded-lg w-20 text-white hover:bg-yellow-500">Editar<button>
                        <form action="{{route('eliminarRegistro',$Usuario)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type = "submit" class="mr-2 mt-2 border border-red-800 bg-red-800 rounded-lg w-20 text-white hover:bg-red-500">Eliminar<button>
                        </form>
                </div>
            </div>
            
            @endforeach
            <div class="pagination mt-4">
                {{ $usuarios->links() }}
            </div>

        </div>
    </div>

</div>


@endsection