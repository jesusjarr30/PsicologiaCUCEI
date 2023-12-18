

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Full Calendar js</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta/lib/draggable.min.js"></script>
  @vite('resources/css/app.css')
</head>
<body>

    @extends('layouts.BasePsicologo')

    @section('contentPsicologo')
<!-- Alert -->
    @if(session('success'))
    <div class="alert alert-success">
        <div class="bg-green-100 border-t-4 border-green-500 rounded-b px-4 py-3 shadow-md my-4">
          <div class="flex items-center">
              <div class="text-green-700">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                  </svg>
              </div>
              <div class="mx-3">
                  <span class="font-semibold text-green-700">Exito!</span>
                  <p class="text-sm text-green-700">{{ session('success') }}</p>
              </div>
          </div>
      </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="items-center">
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4 justify-center items-center">
            <div class="flex items-center">
                <div class="text-red-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <div class="mx-3">
                    <span class="font-semibold text-red-700">Error!</span>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
<!-- Modal Pasiente con Cita-->
    <div class="modal fade" id="infoCitaPasiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-xl font-medium leading-normal text-neutral-800" id="exampleModalLabel">Informacion de la cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body grid grid-cols-1 divide-y">
                    <div>
                        <span class="font-bold"> Pasiente: </span>
                        <div style="display: inline" id="modal-pasiente"> </div>
                        <div></div>

                        <span class="font-bold"> Codigo: </span>
                        <div style="display: inline" id="modal-codigo"> </div>
                        <div></div>

                        <span class="font-bold"> Nacimiento: </span>
                        <div style="display: inline" id="modal-nacimiento"> </div>

                        <span class="font-bold"> Edad: </span>
                        <div style="display: inline" id="modal-edad"> </div>
                        <div></div>

                        <span class="font-bold"> Correo: </span>
                        <div style="display: inline" id="modal-correo"> </div>
                        <div></div>

                        <span class="font-bold"> Telefono: </span>
                        <div style="display: inline" id="modal-telefono"> </div>
                        <div></div>
                    </div>

                    <div>
                        <h3 class="font-bold"> Descripcion: </h3>
                        <div style="display: inline" id="modal-descripcion"> </div>
                        <div></div>
                    </div>
                    <div>
                        <h3 class="font-bold"> Expectativas: </h3>
                        <div style="display: inline" id="modal-expectativa"> </div>
                        <div></div>
                    </div>
                    <div>
                        <h3 class="font-bold"> Horario esperado: </h3>
                        <span class="font-bold"> Lunes: </span>
                        <div style="display: inline" id="modal-horario-Lun"> </div>
                        <div></div>

                        <span class="font-bold"> Martes: </span>
                        <div style="display: inline" id="modal-horario-Mar"> </div>
                        <div></div>

                        <span class="font-bold"> Miercoles: </span>
                        <div style="display: inline" id="modal-horario-Mie"> </div>
                        <div></div>

                        <span class="font-bold"> Jueves: </span>
                        <div style="display: inline" id="modal-horario-Jue"> </div>
                        <div></div>
                        
                        <span class="font-bold"> Viernes: </span>
                        <div style="display: inline" id="modal-horario-Vie"> </div>
                        <div></div>
                    </div>

                    <div>
                        

                        <span class="font-bold"> Clasificacion: </span>
                        <div style="display: inline" id="modal-clasificacion"> </div>
                        <div></div>

                        <span class="font-bold"> Secciones: </span>
                        <span style="display: inline" id='modal-seccionesRestantes'>  </span><span style="display: inline"> / </span>
                        <div style="display: inline" id="modal-secciones"> </div>
                        <div></div>
                    </div>

                    <div>
                        <span class="font-bold"> Fecha: </span>
                        <div style="display: inline" id="modal-fecha"> </div>
                        <div></div>

                        <span class="font-bold"> Consultorio: </span>
                        <div style="display: inline" id="modal-consultorio"> </div>
                        <div></div>

                        <span class="font-bold"> Atendido: </span>
                        <div style="display: inline" id="modal-atendido"> </div>
                        <div></div>

                        <span class="font-bold"> Confirmado: </span>
                        <div style="display: inline" id="modal-confirmado"> </div>
                        <div></div>

                        <span class="font-bold"> Psicologo asignado: </span>
                        <div style="display: inline" id="modal-psicologo"> </div>
                        <div></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bg-gray-600 hover:bg-gray-800 text-white px-2 py-2 rounded-md" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" id="citaAtendidaBtn" class=" bg-blue-600 hover:bg-blue-800 text-white px-2 py-2  rounded-md">Marcar como atendido</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

<!-- Body -->
    <div class="container-fluid">
        <div class="text-center mt-5">
        <!-- Botones de consultorios-->
            <h3 >Citas del psicologo, Consultorio - {{$consultorio}} -</h3>
            <a href="{{route('calendar.indexPsi',1) }}">
                <button form="" class="font-medium text-base hover:text-blue-600 text-blue-300">Consultorio 1</button>
            </a>
            <a href="{{route('calendar.indexPsi',2) }}">
                <button form="" class="font-medium text-base hover:text-blue-600 text-blue-300">Consultorio 2</button>
            </a>
            <a href="{{route('calendar.indexPsi',3) }}">
                <button form="" class="font-medium text-base hover:text-blue-600 text-blue-300">Consultorio 3</button>
            </a>
        </div>
        <div class="grid grid-rows-2 grid-flow-col gap-4">
            <!-- Calendario -->
            <div class="row-start-1 row-end-4">
                    <div id='calendar-container'>
                        <div id='calendar'></div>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        
        var citas = @json($eventsCitas);
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        // initialize the calendar
  // -----------------------------------------------------------------
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                
                // Traduccion
                buttonText: {
                today: 'hoy',
                month: 'mes',
                week: 'semana',
                day: 'dia'
                },
                monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
                
                // Propiedades del fc
                events: citas,
                selectHelper: true,
                defaultView: 'agendaWeek',
                nowIndicator: true,
                allDaySlot: false,
                slotDuration: '01:00:00',
                weekends:false,
                minTime: "08:00",
                maxTime: "19:00",
                eventDurationEditable: false,
                height:'auto',

                eventClick: function(event){
                    var id = event.id;
                    var usuario_id = event.usuario_id;
                    {console.log('eventClick');}
                    {console.log('Evento: '.event);}

                    $.ajax({
                        url:"{{ route('calendar.infoPasienteCitaPsi', '') }}" +'/'+ id,
                        type:"POST",
                        dataType:'json',
                        success:function(response)
                        {
                            { console.log('calendar.info'); }
                            { console.log(response); }

                            for (let parametro in response) {
                                var div = document.getElementById(parametro);
                                div.innerHTML = response[parametro];
                            }
                            // Cambiar el estado del botton dependiendo si esta asignado un psicologo
                            var citaAtendidaBtn =  document.getElementById("citaAtendidaBtn");
                            { console.log(document.getElementById("modal-atendido").innerHTML); }
                            if(document.getElementById("modal-atendido").innerHTML != "Atendido")
                            {
                                citaAtendidaBtn.removeAttribute("disabled");
                                citaAtendidaBtn.setAttribute("class","bg-blue-600 hover:bg-blue-800 text-white px-2 py-2  rounded-md");
                            }else{
                                citaAtendidaBtn.setAttribute("disabled",true);
                                citaAtendidaBtn.setAttribute("class","bg-gray-600 hover:bg-blue-800 text-white px-2 py-2  rounded-md");
                            }

                        },
                        error:function(error)
                        {
                            { console.log('calendar.info - error'); }
                        },
                    });

                    $('#infoCitaPasiente').modal('toggle');
                // Botones de infoCitaPasiente
                    $('#citaAtendidaBtn').off('click').click(function() { 
                        {console.log('citaAtendidaBtn');}     

                        $.ajax({
                            url:"{{ route('calendar.citaAtendida', '') }}" +'/'+ id,
                            type:"POST",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#infoCitaPasiente').modal('hide')
                                swal("Good job!", "Cita atendida", "success").then(function() {
                                    location.reload();
                                });
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    });
                },

            });

        });
    </script>
    @endsection

</body>
</html>
