<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\ordentrabajo;
use App\Models\plantilladetalles;
use App\Models\plantillas;
use App\Models\Producto;
use App\Models\vw_catalogos;
use App\Models\vw_clientes;
use App\Models\vw_empleados;
use Illuminate\Http\Request;

class OrdentrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes= ordentrabajo::all()
        ->where('activo',true);   

        $plantillas= plantillas::all()
        ->where('activo',true);  

        return view('ordenes.index', compact('ordenes','plantillas'));
    }

    public function create(Request $request)
     {  
        $tareas = plantilladetalles::select("*")
        ->where('plantilla_id',$request->plantilla_id)
        ->orderBy("orden")
        ->get();        

        $tecnicos = vw_empleados::all();
        $clientes = vw_clientes::all();

        $productos = Producto::all()
        ->where('activo',true);

        $medidas = vw_catalogos::all()
        ->where('nombre','Unidad_Medida');

        return view('ordenes.edit', compact('tareas','tecnicos','clientes','productos','medidas'));
     }

     public function edit()
     {      
       
        return view('ordenes.create');
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ordentrabajo $ordentrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ordentrabajo $ordentrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ordentrabajo $ordentrabajo)
    {
        //
    }
}
