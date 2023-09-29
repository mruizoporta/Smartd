<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empleado::where('activo',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->empresa_id=$request->empresa_id;  
        $empleado->persona_id=$request->persona_id;     
        $empleado->fechaingreso=$request->fechaingreso;
        $empleado->fechaegreso=$request->fechaegreso; 
        $empleado->cargo_id=$request->cargo_id; 
        $empleado->save();
        return $empleado;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return $empleado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->empresa_id=$request->empresa_id;  
        $empleado->persona_id=$request->persona_id;     
        $empleado->fechaingreso=$request->fechaingreso;
        $empleado->fechaegreso=$request->fechaegreso; 
        $empleado->cargo_id=$request->cargo_id; 
        $empleado->save();
        return $empleado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->activo=false;   
        $empleado->save();
        return $empleado;
    }
}
