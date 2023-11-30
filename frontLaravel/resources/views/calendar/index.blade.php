

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
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Codigo de estudante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="title">
          <span id="titleError" class="text-danger"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

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
        
        var booking = @json($events);
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
                
                //events: booking,
                events: citas,
                selectable: true,
                selectHelper: true,
                defaultView: 'agendaWeek',
                nowIndicator: true,
                /*
                select: function(start, end, allDays) {
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        var start_date = moment(start).format('YYYY-MM-DD, HH:mm:ss');

                        $.ajax({
                            url:"{{ route('calendar.storeCita') }}",
                            type:"POST",
                            dataType:'json',
                            data:{ title, start_date },
                            success:function(response)
                            {
                                { console.log(response); }
                                $('#bookingModal').modal('hide')

                                $('#calendar').fullCalendar('renderEvent', {
                                    'cliente_id': response.cliente_id,
                                    'title' : response.title,
                                    'start'  : response.start,
                                    'end'  : response.end,
                                    'color' : response.color
                                });

                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                        });
                    });
                },*/
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
                                swal("Good job!", "Event Updated!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                },
                eventClick: function(event){
                    var id = event.id;
                    if(confirm('Are you sure want to remove it')){
                        $.ajax({
                            url:"{{ route('calendar.destroyCita', '') }}" +'/'+ id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#calendar').fullCalendar('removeEvents', response);
                                // swal("Good job!", "Event Deleted!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    }

                },
                
                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },

            });
            /*
            $("#bookingModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();
            });*/

        });
    </script>
    @endsection

</body>
</html>
