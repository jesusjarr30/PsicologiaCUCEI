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

<h1 class="fond-bold text-2xl">Horario Uso de Consultorios</h1>
se depe de poner en lista el dia lunes 
horario y consulotiro 1 nombre y horario;

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
      
    </tbody>
</table>

</body>
</html>
