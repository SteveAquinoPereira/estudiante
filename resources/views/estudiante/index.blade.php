@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <h1>Lista estudiantes</h3>
                <a href="{{ route('estudiante.create') }}">Añadir Estudiante</a>
                <div class="tabla">
                    <table>
                    <thead>
                        <th>nombre</th>
                        <th>apellido</th>
                        <th>cedula</th>
                        <th>edad</th>
                        <th>editar</th>
                        <th>eliminar</th>
                    </thead>
                    <tbody>
                        @if ($estudiantes->count())
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td>{{$estudiante->nombre}}</td>
                                <td>{{$estudiante->apellido}}</td>
                                <td>{{$estudiante->cedula}}</td>
                                <td>{{$estudiante->edad}}</td>
                                <td><a href="{{action('EstudianteController@edit', $estudiante->id)}}" ></a></td>
                                <td><form action="{{action('EstudianteController@destroy', $estudiante->id)}}" method="post">
                                    {{csrf_field()}} <input name="_method" type="hidden" value="DELETE">

                                    <button type="submit"></button> 
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>No hay registro !</td>
                        </tr>
                        @endif
                    </tbody>
                    </table>
                </div>

        </section>
    </div>
@endsection