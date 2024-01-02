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
      background-color: #be185d;
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
    <h2 class="titulo">Horario consultorio (Semana)</h2>
    <p>Semana del {{ \Carbon\Carbon::now()->startOfWeek()->formatLocalized('%d de %B') }} al {{ \Carbon\Carbon::now()->endOfWeek()->formatLocalized('%d de %B') }} de {{ \Carbon\Carbon::now()->year }}</p>

    @foreach($resultadosOrganizados as $dia => $psicologos)
    <h2>{{ $dia }}</h2>
    @foreach($psicologos as $psicologo => $consultorios)
        <h3>{{ $psicologo }}</h3>
        
            <table id="customers">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Atendido</th>
                        <th>Consultorio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultorios as $cita)
                    <tr>
                        <td>{{ $cita['fecha'] ?? 'N/A' }}</td>
                        <td>{{ $cita['atendido'] ?? 'N/A' }}</td>
                        <td>{{ $cita['consultorio'] ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        
    @endforeach
@endforeach


</body>
</html>
