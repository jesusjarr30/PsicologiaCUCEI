@extends('layouts.BasePsicologo')

@section('contentPsicologo')

<div> Hola esta es la pgina de citas Psicologo</div>
<td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $citasPsicologo->nombre }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $citasPsicologo->email }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $citasPsicologo->telefono }}</td>

@endsection