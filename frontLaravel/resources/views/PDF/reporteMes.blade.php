<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Citas</title>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    @vite('resources/css/app.css')
</head>
<body>

<h1 class="fond-bold text-2xl">Reporte Mensual</h1>

<table class="w-full">
    <thead class="bg-gray-50 border-b-2 borde-gray-200">
        <tr>
            <th class="p-3 text-md font-md font-semibold tracking-wide text-left">Psicologo</th>
            <th class="p-3 text-md font-md font-semibold tracking-wide text-left" >Cliente</th>
            <th class="p-3 text-md font-md font-semibold tracking-wide text-left">Consultorio</th>
            <th class="p-3 text-md font-md font-semibold tracking-wide text-left">Fecha</th>
            <th class="p-3 text-md font-md font-semibold tracking-wide text-left">Atendido</th>
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-100 ">
        @php
            $rowColor = 'bg-white'; // Inicialmente, la primera fila es blanca
        @endphp
        @foreach($citas as $cita)
            <tr style="background-color: {{ $rowColor === 'bg-white' ? '#FFFFFF' : '#E5E5E5' }};">
                
                <td class="p-3 text-sm text-gray-700 ">{{ $cita->nombre_usuario }}</td>
                <td class="p-3 text-sm text-gray-700 ">{{ $cita->nombre_cliente }}</td>
                <td class="p-3 text-sm text-gray-700 ">{{ $cita->consultorio }}</td>
                <td class="p-3 text-sm text-gray-700 ">{{ $cita->fecha }}</td>
                <td class="p-3 text-sm text-gray-700 ">{{ $cita->atendido }}</td>
            </tr>
            @php
                // Cambia el color de la fila para la siguiente iteración
                $rowColor = ($rowColor === 'bg-white') ? 'bg-gray-200' : 'bg-white';
            @endphp
        @endforeach
    </tbody>
</table>

</body>
</html>
