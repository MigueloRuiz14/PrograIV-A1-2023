<?php
namespace App\Http\Controllers;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select * from alumnos
        return Alumno::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert into alumnos values...
        Alumno::create($request->all());
        return response()->json(['msg'=>'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Alumno $alumno){
    // Obtener el registro del alumno desde la base de datos
    $alumno = Alumno::find($request['idAlumno']);

    // Mostrar los valores actuales de los campos
    $codigo = $alumno->codigo;
    $nombre = $alumno->nombre;
    $direccion = $alumno->direccion;
    $telefono = $alumno->telefono;
    $dui = $alumno->dui;

    // Retornar una respuesta JSON con los valores actuales de los campos
    return response()->json([
        'codigo_actual'=>$codigo,
        'nombre_actual'=>$nombre,
        'direccion_actual'=>$direccion,
        'telefono_actual'=>$telefono,
        'dui_actual'=>$dui,
        'msg'=>'ok'
    ], 200);
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //update alumnos set ... where id=? X
        //update alumnos set ... where idAlumno=? 
        //$alumno->update($request->all());
        $alumno::where('idAlumno', $request['idAlumno'])->update([
            'codigo'=>$request['codigo'],
            'nombre'=>$request['nombre'],
            'direccion'=>$request['direccion'],
            'telefono'=>$request['telefono'],
            'dui'=>$request['dui'],
        ]);
        return response()->json(['msg'=>'ok'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Alumno $alumno)
    {
        //delete from alumnos where id=? X
        //delete from alumnos where idAlumno=? 
        //$alumno->delete();
        $alumno::where('idAlumno', $request['idAlumno'])->delete();
        return response()->json(['msg'=>'ok'], 200);
    }
}
