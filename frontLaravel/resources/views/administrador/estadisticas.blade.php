@extends('layouts.BaseAdmin')

@section('contentAdmin')
<div class="mt-4 mx-auto">

    <div class="container mx-auto">
        <h1 class="text-4xl ">Estadisticas</h1>
        <div class="mt-4 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2 gap-x-10 gap-y-14">

            <div class="bg-blue-400 flex flex-col items-center justify-center p-6 text-2xl border-2 border-blue-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/admin.png') }}" alt="step"/>
                <h2 class="text-white hover:text-yellow-400"><strong>Administradores: {{$admin}}</strong></h2>
            </div>
            <div class="bg-blue-400 flex flex-col items-center justify-center p-6 text-2xl  border-2 border-blue-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/psicologo.png') }}" alt="step"/>
                <h1 class="text-white hover:text-yellow-400"><strong>Psicólogos: {{$psicologo}}</strong></h1>
            </div>
        
            <div class="bg-blue-400 flex flex-col items-center justify-center p-6 text-2xl  border-2 border-blue-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/paciente.png') }}" alt="step"/>
                <h2 class="text-white hover:text-yellow-400"><strong>Pacientes {{$pacientes}}</strong></h2>
            </div>
        
            <div class="bg-blue-400 flex flex-col items-center justify-center p-6 text-2xl  border-2 border-blue-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/cita.png') }}" alt="step"/>
                <h2 class="text-white hover:text-yellow-400"><strong>Citas: {{$citas}}</strong></h2>
            </div>
        </div>
        

    </div>
    <div class="container mx-auto">
        <h1 class="text-4xl mt-8">Generacion de reportes</h1>
        <div class="mt-4 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2 gap-x-10 gap-y-14">
            
            <div class="bg-cyan-400 flex flex-col items-center justify-center p-6 text-2xl border-2 border-cyan-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/reporte.png') }}" alt="step"/>
                <a class="text-white hover:text-yellow-400 font-bold"href="{{ route('pdfSemanal') }}">Reporte Semanal</a>
            </div>
        
        
            <div class="bg-cyan-400 flex flex-col items-center justify-center p-6 text-2xl  border-2 border-cyan-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/grafico.png') }}" alt="step"/>
                <a class="text-white hover:text-yellow-400 font-bold" href="{{ route('pdfMensual') }}">Reporte Mensual</a>
            </div>
        
            <div class="bg-cyan-400 flex flex-col items-center justify-center p-6 text-2xl  border-2 border-cyan-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/historia.png') }}" alt="step"/>
                <a class="text-white hover:text-yellow-400" href="{{ route('pdfHistorico') }}"><strong>Historial (todas la citas)</strong></a>
            </div>
            <div class="bg-cyan-400 flex flex-col items-center justify-center p-6 text-2xl  border-2 border-cyan-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/reporteUsuario.png') }}" alt="step"/>
                <a class="text-white hover:text-yellow-400" href="{{ route('pdfPsicologoHorario') }}"><strong>Reporte por Psicologo (Semana)</strong></a>
            </div>
            <div class="bg-cyan-400 flex flex-col items-center justify-center p-6 text-2xl  border-2 border-cyan-600 rounded-xl">
                <img class="w-32 object-cover object-center rounded-lg mb-4" 
                src="{{ asset('Imagenes/iconosEstadistica/reporteConsultorio.png') }}" alt="step"/>
                <a class="text-white hover:text-yellow-400" href="{{ route('pdfHorarioConsultorio') }}"><strong>Reporte consultorio (semane)</strong></a>
            </div>
        
            
        </div>
        
    </div>
</div>

@endsection