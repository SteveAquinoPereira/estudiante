@extends('layouts.layout')
@section('content')
    <section class="content">
        <h1>Lista estudiantes</h3>
            <a href="{{ route('estudiante.create') }}">Añadir Estudiante</a>
                    <table class="table table-bordred table-striped">
                    {{--datos a mostrar --}}
                    <thead>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>cedula</th>
                    <th>edad</th>
                    <th>editar</th>
                    <th>eliminar</th>
                    </thead>
                    <tbody>
                        {{--comprobando si existen estudiantes --}}
                        @if ($estudiantes->count())
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                {{--datos de la bd --}}
                                <td>{{$estudiante->nombre}}</td>
                                <td>{{$estudiante->apellido}}</td>
                                <td>{{$estudiante->cedula}}</td>
                                <td>{{$estudiante->edad}}</td>
                                <td><a class="btn btn-primary btn-xs" href="{{action('EstudianteController@edit', $estudiante->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><form action="{{action('EstudianteController@destroy', $estudiante->id)}}" method="post">
                                {{csrf_field()}} <input name="_method" type="hidden" value="DELETE">
                                <button type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>No hay registros !</td>
                        </tr>
                        @endif
                    </tbody>
                    </table>

    </section>
@endsection