<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }
 
     public function create()
     { 
         return view('roles.create');
     }
 
   public function edit(Rol $rol){  
    
         return view('roles.edit', compact('rol'));
     }


    public function index()
    {
        $roles= Rol::all()
        ->where('activo',true);   

        return view('roles.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->nombre=$request->nombre;       
        $rol->seguridad= $request->seguridad;
        $rol->configuracion= $request->configuracion;
        $rol->catalogos= $request->catalogos;
        $rol->inventario= $request->inventario;
        $rol->facturacion= $request->facturacion;
        $rol->ordentrabajo= $request->ordentrabajo;
        $rol->cuentasporcobrar= $request->cuentasporcobrar;
        $rol->cuentasporpagar= $request->cuentasporpagar;
        $rol->contabilidad= $request->contabilidad;
        $rol->save();
        $notification='El rol ha sido creada correctamente.';
        return redirect('/roles')->with(compact('notification'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        return $rol;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        $rol->nombre=$request->nombre;   
        $rol->seguridad= $request->input('seguridad');
        $rol->configuracion= $request->configuracion;
        $rol->catalogos= $request->catalogos;
        $rol->inventario= $request->inventario;
        $rol->facturacion= $request->facturacion;
        $rol->ordentrabajo= $request->ordentrabajo;
        $rol->cuentasporcobrar= $request->cuentasporcobrar;
        $rol->cuentasporpagar= $request->cuentasporpagar;
        $rol->contabilidad= $request->contabilidad;      
        $rol->save();
        $notification='El rol ha sido actualizada correctamente.';      
        return redirect('/roles')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $rol->activo=false;     
        $rol->save();
        $notification='El rol ha sido inactivada correctamente.';      
        return redirect('/roles')->with(compact('notification'));
    }
}
