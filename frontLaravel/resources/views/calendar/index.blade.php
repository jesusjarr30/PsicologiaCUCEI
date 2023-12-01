

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

</head>
<body>

    @extends('layouts.BaseAdmin')

    @section('contentAdmin')
    <!-- Modal -->
    <div class="modal fade" id="infoCita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informacion de la cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span > Pasiente: </span>
                    <div style="display: inline" id="modal-pasiente"> </div>
                    <div></div>

                    <span > Codigo: </span>
                    <div style="display: inline" id="modal-codigo"> </div>
                    <div></div>

                    <span > Correo: </span>
                    <div style="display: inline" id="modal-correo"> </div>
                    <div></div>

                    <span > Edad: </span>
                    <div style="display: inline" id="modal-edad"> </div>
                    <div></div>

                    <span > Telefono: </span>
                    <div style="display: inline" id="modal-telefono"> </div>
                    <div></div>

                    <span > Descripcion: </span>
                    <div style="display: inline" id="modal-descripcion"> </div>
                    <div></div>

                    <span > Expectativas: </span>
                    <div style="display: inline" id="modal-expectativa"> </div>
                    <div></div>

                    <span > Horario: </span>
                    <div style="display: inline" id="modal-horario"> </div>
                    <div></div>

                    <span > Clasificacion: </span>
                    <div style="display: inline" id="modal-clasificacion"> </div>
                    <div></div>

                    <span > Secciones: </span>
                    <div style="display: inline" id="modal-secciones"> </div>
                    <div></div>

                    <span > Nacimiento: </span>
                    <div style="display: inline" id="modal-nacimiento"> </div>
                    <div></div>

                    <span id="titleError" class="text-danger"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveBtn" class="btn btn-primary">Eliminar Cita</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Body -->
    <div class="container-fluid">
        <div class="row">
            <div class="col- 12">
                <h3 class="text-center mt-5">Gestionar citas</h3>
                <section class="content">
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-2">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Pacientes pendientes</strong>
                                </div>
                                <div class="card-body">
                                    <div id='external-events'>
                                        <p>
                                        @foreach($clasificacion as $clasi)
                                            @php
                                                $rowColor= 'bg-white';
                                                switch($clasi->clasificacion){
                                                    case 'suicidio':
                                                        $rowColor= '#dc3545';
                                                        break;
                                                    case 'depresion':
                                                        $rowColor= '#ffc107';
                                                        break;
                                                    case 'ansiedad':
                                                        $rowColor= '#198754';
                                                        break;
                                                    case 'otros':
                                                        $rowColor= '#0dcaf0';
                                                        break;
                                                    default:
                                                        $rowColor= '#dce4e6';
                                                        break;
                                                }
                                            @endphp
                                                <div id="draggable" class='fc-event' style="background-color:{{$rowColor}}" 
                                                    data-value='{ "cliente_id":"{{$clasi->cliente_id}}", "title":"{{$clasi->codigo}}", "duration":"01:00", "color":"{{$rowColor}}", "horario":"{{$clasi->horario}}" }' 
                                                    >{{$clasi->codigo}}: {{$clasi->horario}}</div>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10">
                        <div class="card card-primary">
                            <div id='calendar-container'>
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    
                    </div>
                    </section>
                

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
        //----------------------------------------------------

        $('#external-events .fc-event').each(function() {
            // Obtiene los datos de los eventos externos
            var data = $.parseJSON($(this).attr('data-value'));
            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                id: null,
                title: data['title'], // use the element's text as the event title
                duration : "01:00",
                color: data['color'] ,
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 999,
              revert: true,      // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });
        
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
                selectable: true,
                selectHelper: true,
                defaultView: 'agendaWeek',
                nowIndicator: true,
                allDaySlot: false,
                slotDuration: '01:00:00',
                weekends:false,
                minTime: "08:00",
                maxTime: "19:00",
                eventDurationEditable: false,
                droppable: true,
                editable: true,
                drop: function() {
                    $(this).remove();
                },
                eventReceive: function(event) {
                    //get the bits of data we want to send into a simple object

                    {console.log("eventReceive")};
                    {console.log(event)};

                    var title = event.title;
                    var color = event.color;
                    var start_date = moment(event.start).format('YYYY-MM-DD, HH:mm:ss');

                    //var start_date = moment(info.event.start).format('YYYY-MM-DD, HH:mm:ss');
                    $.ajax({
                        url:"{{ route('calendar.storeCita') }}",
                        type:"POST",
                        dataType:'json',
                        data:{ title, start_date },
                        success:function(response)
                        {
                            { console.log(response); }
                            swal("Good job!", "Cita agendada!", "success");
                            event.id= response.id;
                        },
                        error:function(error)
                        {
                            if(error.responseJSON.errors) {
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                        },
                    });
                },
                eventDrop: function(event) {
                    {console.log("eventDrop")};

                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD, HH:mm:ss');

                    {console.log(event)};

                    $.ajax({
                            url:"{{ route('calendar.updateCita', '') }}" +'/'+ id,
                            type:"PATCH",
                            dataType:'json',
                            data:{ start_date },
                            success:function(response)
                            {
                                { console.log(response); }
                                swal("Good job!", "Cita actualizada!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                },
                eventClick: function(event){
                    var id = event.id;
                    var cliente_id = event.cliente_id;
                    {console.log('eventClick');}
                    {console.log(event);}

                    $.ajax({
                        url:"{{ route('calendar.info', '') }}" +'/'+ cliente_id,
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
                        },
                        error:function(error)
                        {
                            { console.log('calendar.info - error'); }
                        },
                    });

                    $('#infoCita').modal('toggle');

                    $('#saveBtn').click(function() {  
                         $.ajax({
                            url:"{{ route('calendar.destroyCita', '') }}" +'/'+ id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {
                                const idDiv = ['modal-pasiente','modal-codigo','modal-correo','modal-edad','modal-telefono','modal-descripcion',
                                        'modal-expectativa','modal-horario','modal-clasificacion','modal-secciones','modal-nacimiento' ];


                                $('#infoCita').modal('hide')
                                $('#calendar').fullCalendar('removeEvents', response);
                                 swal("Good job!", "Cita eliminada!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    });
                },
                
                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },

            });

        });
    </script>
    @endsection

</body>
</html>
