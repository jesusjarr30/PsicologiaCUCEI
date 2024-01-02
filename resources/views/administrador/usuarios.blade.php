@extends('layouts.BaseAdmin')

@section('contentAdmin')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="p-5 h-screen bg-gray-100">
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
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">Correo</th>
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">Telefono</th>
                    <th class="w-10 p-3 text-sm font-sm font-semibold tracking-wide text-left">Rol</th>
                    
                    <th class="p-3 text-sm font-sm font-semibold tracking-wide text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $rowColor = 'bg-white'; // Inicialmente, la primera fila es blanca
                @endphp
                @foreach($usuarios as $Usuario)
                <tr class="{{ $rowColor }} ">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Usuario->nombre }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Usuario->email }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $Usuario->telefono }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        <span class="whitespace-nowrap py-1.5 p-1.5 text-xs font-medium uppercase tracking-wider rounded-lg
                         @if($Usuario->role === 'ADMIN') px-3.5 text-blue-800 bg-blue-200 @else px-5 text-red-800
                          bg-red-200 @endif">{{ $Usuario->role }}</span>
                    </td>
                    
                    <td class="flex px-4 py-4"> 
                        <a href="{{route('VerUsuarios',['id' => $Usuario->id])}}" class="mr-2 mt-2 text-center font-bold text-green-900  bg-green-600 rounded-lg  
                         hover:bg-green-800 hover:text-white px-6 py-2">Ver</a>

                        <a href="{{ route('EditarUsuariosAdmin', ['id' => $Usuario->id]) }}" class="mr-2 mt-2 text-center font-bold bg-yellow-600 rounded-lg text-yellow-900 hover:text-white
                         hover:bg-yellow-800 px-5 py-2">Editar</a>

                        <a onclick="return confirmarEliminar()" class="mr-2 mt-2 text-center
                         border-red-800 bg-red-800 rounded-lg  text-white hover:bg-red-500 px-4 py-2">Eliminar</a>

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
                    <a class="mr-2 mt-2 border border-green-800 bg-green-800 rounded-lg w-20 text-white 
                    hover:bg-green-500 px-2 py-2">Ver</a>

                    <a href="{{ route('EditarUsuariosAdmin', ['id' => $Usuario->id]) }}" 
                         class="mr-2 mt-2 border border-yellow-800 bg-yellow-800 rounded-lg w-20
                          text-white hover:bg-yellow-500 px-2 py-2">Editar</a>

                    <a onclick="return confirmarEliminar()" type = "submit" 
                    class="mr-2 mt-2 border border-red-800 bg-red-800 rounded-lg w-20 text-white
                     hover:bg-red-500 px-2 py-2">Eliminar</a>
                </div>
            </div>
            
            @endforeach
            <div class="pagination mt-4">
                {{ $usuarios->links() }}
            </div>

        </div>
    </div>

</div>

<script>
    function confirmarEliminar() {
        return Swal.fire({
            title: '¿Estás seguro?',
            text: 'No podrás revertir esto',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href ="{{ route('eliminar-Usuario', ['id' => $Usuario->id]) }}";
            }
            return result.isConfirmed;
        });
    }
</script>


@endsection