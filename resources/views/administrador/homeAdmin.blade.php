@extends('layouts.BaseAdmin')

@section('contentAdmin')

<div> Hola esta es la pgina princial Admin</div>

<tr>
    
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ Auth::user()->nombre }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ Auth::user()->email }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ Auth::user()->telefono }}</td>
    
</tr>

@endsection