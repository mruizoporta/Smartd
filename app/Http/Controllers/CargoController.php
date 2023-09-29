<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function create()
     { 
         return view('cargos.create');
     }
 
   public function edit(Cargo $cargo){  
    
         return view('cargos.edit', compact('cargo'));
     }


    public function index()
    {
        $cargos= Cargo::all()
        ->where('activo',true);   

        return view('cargos.index', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cargo = new Cargo();
        $cargo->nombre=$request->nombre;      
        $cargo->save();

        $notification='El cargo ha sido creada correctamente.';
        return redirect('/cargos')->with(compact('notification'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        return $cargo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        $cargo->nombre=$request->nombre;      
        $cargo->save();

        $notification='El cargo ha sido actualizada correctamente.';      
        return redirect('/cargos')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->activo=false;     
        $cargo->save();
        $notification='El cargo ha sido inactivada correctamente.';      
        return redirect('/cargos')->with(compact('notification'));
    }
}
