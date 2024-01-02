@extends('layouts.BasePsicologo')

@section('contentPsicologo')

<div> Hola esta es la pgina de citas Psicologo</div>
<tr>
    
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ Auth::user()->nombre }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ Auth::user()->email }}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ Auth::user()->telefono }}</td>
    
</tr>

    
@endsection