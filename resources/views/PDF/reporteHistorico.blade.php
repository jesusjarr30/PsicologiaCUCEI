<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Citas</title>
</head>
<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #ca8a04;
      color: white;
    }
    .titulo{
        text-align: left;
            font-weight: bold;
            margin-top: 50px;
        
    }
    .header {
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px;
        }
        .header img {
    width: 250px; /* Ajusta el valor según sea necesario */
}

    </style>
<body>

    <div class="header">
        <img src="Imagenes/logoCUCEI.png" alt="Logo" width="100">
        
    </div>
    <h2 class="titulo">Reporte Historico</h2>
    <p>
        <?php
        \Carbon\Carbon::setLocale('es'); // Establecer el idioma a español
        echo \Carbon\Carbon::now()->formatLocalized('%B de %Y');
        ?>
    </p>

<table id="customers">
    <thead >
        <tr>
            <th >Psicologo</th>
            <th  >Cliente</th>
            <th >Consultorio</th>
            <th >Fecha</th>
            
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-100 ">
        @php
            $rowColor = 'bg-white'; // Inicialmente, la primera fila es blanca
        @endphp
        @foreach($citas as $cita)
            <tr style="background-color: {{ $rowColor === 'bg-white' ? '#FFFFFF' : '#E5E5E5' }};">
                
                <td >{{ $cita->nombre_usuario }}</td>
                <td >{{ $cita->nombre_cliente }}</td>
                <td >{{ $cita->consultorio }}</td>
                <td >{{ $cita->fecha }}</td>
                <td >{{ $cita->atendido }}</td>
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
