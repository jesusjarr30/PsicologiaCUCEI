@extends('layouts.BasePsicologo')

@section('contentPsicologo')

<div> Hola esta es la pgina de citas Psicologo</div>
<td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $usuarioPsicologo->nombre }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $usuarioPsicologo->email }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $usuarioPsicologo->telefono }}</td>
    <dt class="text-sm font-medium leading-6 text-gray-900">{{ $usuarioPsicologo->nombre }}</dt>

    
@endsection