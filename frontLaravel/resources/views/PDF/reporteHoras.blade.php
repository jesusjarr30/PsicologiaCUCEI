<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total de Horas Registradas por Usuario</title>
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
          background-color: #4d7c0f;
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
</head>
<body>
    <div class="header">
        <img src="Imagenes/logoCUCEI.png" alt="Logo" width="100">
        
    </div>
    <h2 class="titulo">Reporte de Horas</h2>
    <p>{{ \Carbon\Carbon::now()->today()->formatLocalized('%d de %B') }} de {{ \Carbon\Carbon::now()->year }}</p>


<h2>Total de Horas Registradas por Usuario</h2>

<table id="customers">
    <thead>
        <tr>
            <th>Nombre del Usuario</th>
            <th>Total de Horas Registradas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($resultados as $resultado)
            <tr>
                <td>{{ $resultado->nombreUsuario }}</td>
                <td>{{ $resultado->totalHorasRegistradas }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
