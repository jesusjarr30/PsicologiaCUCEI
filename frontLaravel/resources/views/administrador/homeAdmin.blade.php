@extends('layouts.BaseAdmin')

@section('contentAdmin')

<div> Hola esta es la pgina princial Admin</div>

<tr>
    
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $homeAdmin->nombre }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $homeAdmin->email }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $homeAdmin->telefono }}</td>
    
</tr>

@endsection