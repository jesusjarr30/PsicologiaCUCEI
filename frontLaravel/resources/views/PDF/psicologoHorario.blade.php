<!DOCTYPE html>
<html>
<head>
    <title>Horario de Citas</title>
    <!-- Puedes incluir aquí tus estilos CSS si es necesario -->
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
      background-color: #0891b2;
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
    <h2 class="titulo">Reporte de psicólogos (Semana)</h2>
    <p>Semana del {{ \Carbon\Carbon::now()->startOfWeek()->formatLocalized('%d de %B') }} al {{ \Carbon\Carbon::now()->endOfWeek()->formatLocalized('%d de %B') }} de {{ \Carbon\Carbon::now()->year }}</p>


    @foreach($resultadosOrganizados as $dia => $doctores)
<h2>{{ $dia }}</h2>
    @foreach($doctores as $doctor => $citas)
        <h3>{{ $doctor }}</h3>
        <table id="customers">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Nombre del Cliente</th>
                    <th>Apellidos del Cliente</th>
                    <th>Consultorio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita['hora'] }}</td>
                        <td>{{ $cita['nombre_cliente'] }}</td>
                        <td>{{ $cita['apellidos_cliente'] }}</td>
                        <td>{{ $cita['consultorio'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endforeach
 

</body>
</html>
