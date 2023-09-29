<?php

namespace App\Http\Controllers;

use App\Models\BodegaProducto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $marcas = Marca::all()
        ->where('activo',true);   

        $medidas = Medida::all()
        ->where('activo',true);  

        $categorias = Categoria::all()
        ->where('activo',true);  

        return view('productos.create', compact('marcas','medidas','categorias'));
    }

  public function edit(Producto $producto){  
        $marcas = Marca::all()
        ->where('activo',true);   

        $medidas = Medida::all()
        ->where('activo',true);  

        $categorias = Categoria::all()
        ->where('activo',true);

        $bodegaproductos= BodegaProducto::with('Almacen')->get()
        ->where('producto_id',$producto->id);

        return view('productos.edit', compact('producto','marcas','medidas','categorias','bodegaproductos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos= Producto::with('categoria','Marca','Medida')->get()
        ->where('activo',true);   

        return view('productos.index', compact('productos'));
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
            $producto = new Producto();
            $producto->empresa_id=1; 
            $producto->codigo=$request->codigo; 
            $producto->nombre=$request->nombre; 
            $producto->categoria_id=$request->categoria_id; 
            $producto->marca_id=$request->marca_id; 
            $producto->medida_id=$request->medida_id; 
            $producto->costopromedio=$request->costopromedio; 
            $producto->preciocredito=$request->preciocredito; 
            $producto->preciocontado=$request->preciocontado;   
            $producto->margenutilidadcredito=$request->margenutilidadcredito; 
            $producto->margenutilidadcontado=$request->margenutilidadcontado;  
            $producto->cantidadminima=$request->cantidadminima; 
            $producto->save();

            //Guardamos en la bodega principal
            $bodegaproducto = new BodegaProducto();
            $bodegaproducto->producto_id=$producto->id;
            $bodegaproducto->almacen_id=1;
            $bodegaproducto->existencia=0;
            $bodegaproducto->save();

        DB::commit();   
        }  
        catch(Exception $e){
            DB::rollback();
        }
        
        $notification='El producto ha sido creada correctamente.';
        return redirect('/productos')->with(compact('notification')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $producto->marca=$producto->Marca;
        $producto->medida=$producto->Medida;
        $producto->categoria=$producto->Categoria;
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->empresa_id=1;//$request->empresa_id; 
        $producto->codigo=$request->codigo; 
        $producto->nombre=$request->nombre; 
        $producto->categoria_id=$request->categoria_id; 
        $producto->marca_id=$request->marca_id; 
        $producto->medida_id=$request->medida_id; 
        $producto->costopromedio=$request->costopromedio; 
        $producto->preciocredito=$request->preciocredito; 
        $producto->preciocontado=$request->preciocontado;   
        $producto->margenutilidadcredito=$request->margenutilidadcredito; 
        $producto->margenutilidadcontado=$request->margenutilidadcontado;  
        $producto->cantidadminima=$request->cantidadminima; 
        $producto->save();
        $notification='El producto ha sido actualizada correctamente.';      
        return redirect('/productos')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->activo=false;     
        $producto->save();
        $notification='El producto ha sido inactivada correctamente.';      
        return redirect('/productos')->with(compact('notification'));
    }
}
