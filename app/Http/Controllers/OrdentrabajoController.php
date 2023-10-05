<?php

namespace App\Http\Controllers;

use App\Models\ordentrabajo;
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

        return view('ordenes.index', compact('ordenes'));
    }

    public function create()
     { 
         return view('ordenes.edit');
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
