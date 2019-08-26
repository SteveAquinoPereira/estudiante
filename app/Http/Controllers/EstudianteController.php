<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ordenar los estudiantes por id, cantidad 200 est
        $estudiantes=Estudiante::orderBy('id')->paginate(200);
        return view('estudiante.index',compact('estudiantes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //redirecciona a create
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valida los datos, y redirecciona a el index
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'cedula'=>'required', 'edad'=>'required']);
        Estudiante::create($request->all());
        return redirect()->route('estudiante.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $estudiantes=Estudiante::find($id);
        return  view('estudiante.show',compact('estudiantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //redirecciona a edit
        $estudiante=estudiante::find($id);
        return view('estudiante.edit',compact('estudiante'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //valida los datos, y sobreescribe o actualiza los datos, redirecciona a el index
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'cedula'=>'required', 'edad'=>'required']);
 
        estudiante::find($id)->update($request->all());
        return redirect()->route('estudiante.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //borra el usuario seleccionado
        Estudiante::find($id)->delete();
        return redirect()->route('estudiante.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
