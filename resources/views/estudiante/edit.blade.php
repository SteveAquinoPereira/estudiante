@extends('layouts.layout')
@section('content')

 <h1 class="panel-title">Nuevo Libro</h1>

<form method="POST" action="{{ route('estudiante.update',$estudiante->id) }}"  role="form"> {{ csrf_field() }}
	<input name="_method" type="hidden" value="PATCH">

	<input type="text" name="nombre" id="nombre" value="{{$estudiante->nombre}}">

	<input type="text" name="apellido" id="apellido" value="{{$estudiante->apellido}}">

	<input type="text" name="cedula" id="cedula" value="{{$estudiante->cedula}}">

	<input type="text" name="edad" id="edad" value="{{$estudiante->edad}}">

 	<input type="submit"  value="Actualizar">
	
	 <a href="{{ route('estudiante.index') }}" >Atrás</a>
	
 </form>
@endsection