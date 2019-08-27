@extends('layouts.layout')
@section('content')

<h1 class="panel-title">Nuevo Libro</h1>
<form method="POST" action="{{ route('estudiante.store') }}"  role="form">{{ csrf_field() }}
                            
    <input type="text" name="nombre" id="nombre"  placeholder="Nombre del estudiante">
                        
    <input type="text" name="apellido" id="apellido"  placeholder="Apellido del estudiante">
                            
    <input type="text" name="cedula" id="cedula"  placeholder="Cedula del estudiante">

    <input type="text" name="edad" id="edad"  placeholder="Edad del estudiante">

    <input type="submit"  value="Guardar" >

    <a href="{{ route('estudiante.index') }}" >Atrás</a>
</form>                                
@endsection