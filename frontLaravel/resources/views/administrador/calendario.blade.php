

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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  @vite('resources/css/app.css')
</head>
<body>

    @extends('layouts.BaseAdmin')

    @section('contentAdmin')
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
    <div class="modal fade" 
            id="infoCitaPasiente" 
            tabindex="-1" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
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
                        <span class="font-bold"> Horario esperado: </span>
                        <div style="display: inline" id="modal-horario"> </div>
                        <div></div>

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

                        <span class="font-bold"> Confirmado: </span>
                        <div style="display: inline" id="modal-confirmado"> </div>
                        <div></div>

                        <span class="font-bold"> Atendido: </span>
                        <div style="display: inline" id="modal-atendido"> </div>
                        <div></div>

                        <span class="font-bold"> Psicologo asignado: </span>
                        <div style="display: inline" id="modal-psicologo"> </div>
                        
                        <div></div>
                    
                        <select id="modal-select-psicologo" class="border-0 px-2 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-3/6 ease-linear transition-all duration-150">
                            <option value="none" selected disabled hidden>Asignar Psicologo</option> 
                            <option  value=null  >Sin asignar</option>
                            @foreach ( $psicologos as $psi )
                                <option  value="{{$psi->id}}" > {{$psi->nombre}} </option>
                            @endforeach
                        </select>
                        <button type="button" id="psiUpdateBtn" class=" bg-green-600 hover:bg-green-800 text-white px-2 py-2  rounded-md">Asignar Psico</button>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-gray-600 hover:bg-gray-800 text-white px-2 py-2 rounded-md" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="agregarCitaBtn" class=" bg-yellow-600 hover:bg-yellow-800 text-white px-2 py-2  rounded-md">Nueva cita</button>
                    <button type='button' id='correoBtn' class=' bg-blue-600 hover:bg-blue-800 text-white px-2 py-2  rounded-md'>Enviar confirmacion</button>
                    <button type="button" id="eliminaBtn" class=" bg-red-600 hover:bg-red-800 text-white px-2 py-2  rounded-md">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
<!-- Modal Pasiente-->
<div class="modal fade"
        id="infoPasiente" 
        tabindex="-1" 
        aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
        
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-xl font-medium leading-normal text-neutral-800" id="exampleModalLabel">Informacion del pasiente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body grid grid-cols-1 divide-y">
                <div>
                    <span class="font-bold"> Pasiente: </span>
                    <div style="display: inline" id="modal-pasiente-infoPasiente"> </div>
                    <div></div>

                    <span class="font-bold"> Codigo: </span>
                    <div style="display: inline" id="modal-codigo-infoPasiente"> </div>
                    <div></div>

                    <span class="font-bold"> Nacimiento: </span>
                    <div style="display: inline" id="modal-nacimiento-infoPasiente"> </div>
                    <div></div>

                    <span class="font-bold"> Edad: </span>
                    <div style="display: inline" id="modal-edad-infoPasiente"> </div>
                    <div></div>

                    <span class="font-bold"> Correo: </span>
                    <div style="display: inline" id="modal-correo-infoPasiente"> </div>
                    <div></div>

                    <span  class="font-bold"> Telefono: </span >
                    <div style="display: inline" id="modal-telefono-infoPasiente"> </div>
                    <div></div>
                </div>
                
                <div>
                    <h3  class="font-bold"> Descripcion: </h3 >
                    <div style="display: inline" id="modal-descripcion-infoPasiente"> </div>
                    <div></div>
                </div>
                <div>
                    <h3  class="font-bold"> Expectativas: </h3 >
                    <div style="display: inline" id="modal-expectativa-infoPasiente"> </div>
                    <div></div>
                </div>

                <div>
                    <span class="font-bold"> Horario esperado: </span>
                    <div style="display: inline" id="modal-horario-infoPasiente"> </div>
                    <div></div>

                    <span class="font-bold"> Clasificacion: </span>
                    <div style="display: inline" id="modal-clasificacion-infoPasiente"> </div>
                    <div></div>

                    <span class="font-bold"> Secciones: </span>
                    <div style="display: inline" id="modal-secciones-infoPasiente"> </div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Body -->
    <div class="container-fluid">
                        <!-- Botones de consultorios-->
                    <div class="text-center mt-5">
                        <h3 >Gestionar citas, Consultorio - {{$consultorio}} -</h3>
                        <a href="{{route('calendar.index',1) }}">
                            <button form="" class="font-medium text-base hover:text-blue-600 text-blue-300">Consultorio 1</button>
                        </a>

                        <a href="{{route('calendar.index',2) }}">
                            <button form="" class="font-medium text-base hover:text-blue-600 text-blue-300">Consultorio 2</button>
                        </a>

                        <a href="{{route('calendar.index',3) }}">
                            <button form="" class="font-medium text-base hover:text-blue-600 text-blue-300">Consultorio 3</button>
                        </a>
                    </div>

                    <div class="grid grid-rows-3 grid-flow-col gap-4">
                        <!-- Eventos externos Pasientes-->
                        <div class="row-span-3">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title ">Pacientes pendientes</strong>
                                    </div>
                                    <div class="card-body">
                                        <div id='external-events'>
                                            <p>
                                            @php 
                                                $clasiflag= array(1,1,1,1); 
                                                $rowColor= '';
                                            @endphp
                                            @foreach($clasificacion as $clasi)
                                                @php
                                                    switch($clasi->clasificacion){
                                                        case 'suicidio':
                                                            $rowColor= '#dc3545';
                                                            if($clasiflag[0]){
                                                                echo "<div class='text-center' style='background-color:$rowColor'> Suicidio</div> ";
                                                                $clasiflag[0] = 0;
                                                            }
                                                            break;
                                                        case 'depresion':
                                                            $rowColor= '#ffc107';
                                                            if($clasiflag[1]){
                                                                echo "<div class='text-center' style='background-color:$rowColor'> Depresion</div> ";
                                                                $clasiflag[1] = 0;
                                                            }
                                                            break;
                                                        case 'ansiedad':
                                                            $rowColor= '#198754';
                                                            if($clasiflag[2]){
                                                                echo "<div class='text-center' style='background-color:$rowColor'> Ansiedad</div> ";
                                                                $clasiflag[2] = 0;
                                                            }
                                                            break;
                                                        case 'otros':
                                                            $rowColor= '#0dcaf0';
                                                            if($clasiflag[3]){
                                                                echo "<div class='text-center' style='background-color:$rowColor'> Otros</div> ";
                                                                $clasiflag[3] = 0;
                                                            }
                                                            break;
                                                        default:
                                                            $rowColor= '#dce4e6';
                                                            break;
                                                    }
                                                @endphp
                                                    <div id="draggable" class='fc-event text-center' style="background-color:{{$rowColor}}" 
                                                        data-value='{ "id":"{{$clasi->id}}", "consultorio": {{$consultorio}}, "codigo":"{{$clasi->codigo}}", "duration":"01:00", "color":"{{$rowColor}}", "horario":"{{$clasi->horario}}" }' 
                                                        >{{$clasi->nombre}} {{$clasi->apellidos}}</div>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Calendario -->
                        <div class="row-span-2 col-span-2 ">
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
    //--------------Evento Pasientes/Citas----------------------
        $("#external-events .fc-event").click(function() {
            //alert("Button code executed.");
            var data = $.parseJSON($(this).attr('data-value'));

            var cliente_id = data['id']; 
                    {console.log('evento externo Click');}
                    {console.log(data);}
                    {console.log(cliente_id);}

                    $.ajax({
                        url:"{{ route('calendar.infoPasiente', '') }}" +'/'+ cliente_id,
                        type:"POST",
                        dataType:'json',
                        success:function(response)
                        {
                            { console.log('calendar.infoPasiente'); }
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
                    $('#infoPasiente').modal('toggle');
        });

        $('#external-events .fc-event').each(function() {
            // Obtiene los datos de los eventos externos
            var data = $.parseJSON($(this).attr('data-value'));
            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                id: null,
                title: data['codigo'], // use the element's text as the event title
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
  // -----------------------Calendario--------------------------
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
                droppable: true,
                editable: true,
                height:'auto',
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
                    {console.log(moment(start_date).format('HH:mm:ss'))}
                    // asigna el consultorio
                    var consultorio = {{$consultorio}};
                    $.ajax({
                        url:"{{ route('calendar.storeCita') }}",
                        type:"POST",
                        dataType:'json',
                        data:{ title, start_date, consultorio },
                        success:function(response)
                        {
                            { console.log("storeCita regresa"); }
                            { console.log(response); }
                            event.id= response.id;
                            Swal.fire("Good job!", "Cita agendada!", "success").then(function() {
                                location.reload();
                            });

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
                                Swal.fire("Good job!", "Cita actualizada!", "success").then(function() {
                                    location.reload();
                                });
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
                    var usuario_id = event.usuario_id;
                    var color = event.color;
                    var consultorio = {{$consultorio}};

                    {console.log('eventClick');}
                    {console.log(event);}

                    $.ajax({
                        url:"{{ route('calendar.infoPasienteCita', '') }}" +'/'+ id,
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
                            var correoBtn =  document.getElementById("correoBtn");
                            if(document.getElementById("modal-psicologo").innerHTML == "Sin asignar")
                            {
                                correoBtn.setAttribute("disabled",true);
                                correoBtn.setAttribute("class","bg-gray-600 hover:bg-blue-800 text-white px-2 py-2  rounded-md");
                            }
                        },
                        error:function(error)
                        {
                            { console.log('calendar.info - error'); }
                        },
                    });

                    $('#infoCitaPasiente').modal('toggle');
                // Botones de infoCitaPasiente
                    $('#eliminaBtn').off('click').click(function() {  
                        { console.log('eliminaBtn'); }
                        Swal.fire({
                            title: 'Eliminar Cita',
                            text: 'Quieres eliminar solo una o todas?',
                            icon: 'warning',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Todas',
                            denyButtonText: 'Solo una',
                            confirmButtonColor: '#d33',
                            denyButtonColor: '#3085d6',
                            customClass: {
                            actions: 'my-actions',
                            cancelButton: 'order-1 right-gap',
                            confirmButton: 'order-2',
                            denyButton: 'order-3',
                          },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                            url:"{{ route('calendar.destroyDemasCitas', '') }}" +'/'+ id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#infoCitaPasiente').modal('hide')
                                $('#calendar').fullCalendar('removeEvents', response);
                                Swal.fire("Good job!", "Cita eliminada!", "success").then(function() {
                                    location.reload();
                                });
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                            } else if (result.isDenied) {
                                $.ajax({
                            url:"{{ route('calendar.destroyCita', '') }}" +'/'+ id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#infoCitaPasiente').modal('hide')
                                $('#calendar').fullCalendar('removeEvents', response);
                                Swal.fire("Good job!", "Cita eliminada!", "success").then(function() {
                                    location.reload();
                                });
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });

                          }
                        })

                         
                    });
                    $('#correoBtn').off('click').click(function() {  
                        {console.log("correoeBtn");}
                        $.ajax({
                            url:"{{ route('calendar.enviarCorreo', '') }}" +'/'+ id,
                            type:"PATCH",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#infoCitaPasiente').modal('hide')
                                Swal.fire("Good job!", "Se a enviado el correo", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    });
                    $('#psiUpdateBtn').off('click').click(function() {  
                        
                        var usuario_id = document.getElementById('modal-select-psicologo').value;

                        {console.log("psicologo-asignado");}
                        {console.log(usuario_id);}
                        $.ajax({
                            url:"{{ route('calendar.asigPsi', '') }}" +'/'+ id,
                            type:"PATCH",
                            dataType:'json',
                            data:{ usuario_id },
                            success:function(response)
                            {
                                $('#infoCitaPasiente').modal('hide')
                                Swal.fire("Good job!", "Psicologo asignado", "success").then(function() {
                                    location.reload();
                                });
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    });
                    $('#agregarCitaBtn').off('click').click(function() {  
                        
                        {console.log("agregarCitaBtn");}
                        {console.log(event);}
                        
                        $.ajax({
                        url:"{{ route('calendar.storeCitaNueva') }}",
                        type:"POST",
                        dataType:'json',
                        data:{ cliente_id, usuario_id, consultorio },
                        success:function(response)
                        {
                            { console.log("storeCita regresa"); }
                            { console.log(response); }
                            event.id= response.id;
                            Swal.fire("Good job!", "Cita agendada!", "success").then(function() {
                                location.reload();
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
