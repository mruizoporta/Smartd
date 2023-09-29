<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Persona;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\TiposEntrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $proveedores = Persona::all()
        ->where('activo',true);   

        $productos = Producto::all()
        ->where('activo',true);

        $tiposentrada = TiposEntrada::all()
        ->where('activo',true);   

        return view('entradas.create', compact('proveedores','tiposentrada','productos'));
    }

  public function edit(Entrada $entrada){  
        $proveedores = Proveedor::all()
        ->where('activo',true);   

        $tiposentrada = TiposEntrada::all()
        ->where('activo',true);       

        return view('entradas.edit', compact('entrada','proveedores','tiposentrada'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas= Entrada::with('Proveedor','TpoEntrada')->get()
        ->where('activo',true);   

        return view('entradas.index', compact('entradas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada = new Entrada();
        $entrada->empresa_id=$request->empresa_id;  
        $entrada->tipoentrada_id=$request->tipoentrada_id;     
        $entrada->almacen_id=$request->almacen_id;
        $entrada->proveedor_id=$request->proveedor_id; 
        $entrada->numerofactura=$request->numerofactura; 
        $entrada->fechafactura=$request->fechafactura; 
        $entrada->fechaentrada=$request->fechaentrada; 
        $entrada->anulada=$request->anulada; 
        $entrada->comentarioanular=$request->comentarioanular; 
        $entrada->save();
        return $entrada;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        return $entrada;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        $entrada->empresa_id=$request->empresa_id;  
        $entrada->tipoentrada_id=$request->tipoentrada_id;     
        $entrada->almacen_id=$request->almacen_id;
        $entrada->proveedor_id=$request->proveedor_id; 
        $entrada->numerofactura=$request->numerofactura; 
        $entrada->fechafactura=$request->fechafactura; 
        $entrada->fechaentrada=$request->fechaentrada; 
        $entrada->anulada=$request->anulada; 
        $entrada->comentarioanular=$request->comentarioanular; 
        $entrada->save();
        return $entrada;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        $entrada->activo=false;   
        $entrada->save();
        return $entrada;
    }
}
