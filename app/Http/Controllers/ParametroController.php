<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('parametros.create');
    }

    public function edit(Parametro $parametro){  
        return view('parametros.edit', compact('parametro'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parametro = new Parametro();
        $parametro->empresa_id=1;//$request->empresa_id; 
        $parametro->porcentajeimpuesto=$request->porcentajeimpuesto; 
        $parametro->porcentajeutilidadcontado=$request->porcentajeutilidadcontado; 
        $parametro->porcentajeutilidadcredito=$request->porcentajeutilidadcredito;     
        $parametro->porcentajeinsumos=$request->porcentajeinsumos; 
        $parametro->porcentajehorasextras=$request->porcentajehorasextras; 
        $parametro->porcentajemanoexterna=$request->porcentajemanoexterna; 

        $parametro->save();
        $notification='El parametro ha sido creada correctamente.';
        return redirect('/parametros')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function show(Parametro $parametro)
    {
        return $parametro;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametro $parametro)
    {
        $parametro->empresa_id=1;//$request->empresa_id; 
        $parametro->porcentajeimpuesto=$request->porcentajeimpuesto; 
        $parametro->porcentajeutilidadcontado=$request->porcentajeutilidadcontado; 
        $parametro->porcentajeutilidadcredito=$request->porcentajeutilidadcredito;   
        $parametro->porcentajeinsumos=$request->porcentajeinsumos; 
        $parametro->porcentajehorasextras=$request->porcentajehorasextras; 
        $parametro->porcentajemanoexterna=$request->porcentajemanoexterna;  
        $parametro->save();
        $notification='El parametro ha sido actualizada correctamente.';      
        return redirect('/home')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametro $parametro)
    {
        $parametro->activo=false;     
        $parametro->save();
        $notification='El parametro ha sido inactivada correctamente.';      
        return redirect('/parametros')->with(compact('notification'));
    }
}
