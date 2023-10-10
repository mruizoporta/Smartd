<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::where('activo',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            DB::beginTransaction();

            $persona = new Persona();
            $persona->empresa_id=1; 
            $persona->nombres=$request->nombres;  
            $persona->apellidos=$request->apellidos;  
            $persona->identificacion=$request->identificacion; 
            $persona->direccion=$request->direccion; 

            if (is_null($request->juririco)){$persona->esjuridico=false;}
            else{$persona->esjuridico=true;}

            $persona->razonsocial=$request->razonsocial; 
            $persona->telefono=$request->telefono; 
            $persona->correo=$request->correo;    
        
            $persona->save();
    
            $cliente = new Cliente();

            $cliente = new Cliente();
            $cliente->empresa_id=$request->empresa_id;  
            $cliente->persona_id=$request->persona_id;
            $cliente->limitecredito=0;//$request->limitecredito; 
            $cliente->save();

            return $cliente;
    
            DB::commit();   
            }  
            catch(Exception $e){
                DB::rollback();
            }
            $notification='El cliente ha sido creado correctamente.';
            return redirect('/clientes')->with(compact('notification')); 
        }

        public function storeorden(Request $request)
        {

        try{
            DB::beginTransaction();

            $persona = new Persona();
            $persona->empresa_id=1; 
            $persona->nombres=$request->nombres;  
            $persona->apellidos=$request->apellidos;  
            $persona->identificacion=$request->identificacion; 
            $persona->direccion=$request->direccion; 

            if (is_null($request->juririco)){$persona->esjuridico=false;}
            else{$persona->esjuridico=true;}

            $persona->razonsocial=$request->razonsocial; 
            $persona->telefono=$request->telefono; 
            $persona->correo=$request->correo;    
        
            $persona->save();
    
            $cliente = new Cliente();

            $cliente = new Cliente();
            $cliente->empresa_id=1;//$request->empresa_id;  
            $cliente->persona_id=$persona->id;
            $cliente->limitecredito=0;//$request->limitecredito; 
            $cliente->save();
            DB::commit();   
            }  
            catch(Exception $e){
                DB::rollback();
            }          
            return redirect('/ordenes/create')->with(compact('cliente')); 
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->empresa_id=$request->empresa_id;  
        $cliente->persona_id=$request->persona_id;     
        $cliente->contacto_id=$request->contacto_id;
        $cliente->limitecredito=$request->limitecredito; 
        $cliente->save();
        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->activo=false;   
        $cliente->save();
        return $cliente;
    }
}
