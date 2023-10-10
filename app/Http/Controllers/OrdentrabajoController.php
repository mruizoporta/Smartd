<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\ordentrabajomateriales;
use App\Models\ordentrabajos;
use App\Models\ordentrabajotareas;
use App\Models\ordentrabajotecnicos;
use App\Models\Parametro;
use App\Models\plantilladetalles;
use App\Models\plantillas;
use App\Models\Producto;
use App\Models\vw_catalogos;
use App\Models\vw_clientes;
use App\Models\vw_empleados;
use App\Models\vw_materialesordenes;
use App\Models\vw_ordenes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdentrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes= ordentrabajos::all()
        ->where('activo',true);   

        $plantillas= plantillas::all()
        ->where('activo',true);  

        $ordenespendientes = vw_ordenes::all()
        ->where('estado_id',17);

        $ordenesprogreso = vw_ordenes::all()
        ->where('estado_id',18);

        return view('ordenes.index', compact('ordenes','plantillas','ordenespendientes','ordenesprogreso'));
    }

    public function create(Request $request)
     {  
        $tareas = plantilladetalles::select("*")
        ->where('plantilla_id',$request->plantilla_id)
        ->orderBy("orden")
        ->get();  
        
        $plantilla = plantillas::all()
        ->where('id',$request->plantilla_id);

        $tecnicos = vw_empleados::all();
        $clientes = vw_clientes::all();

        $productos = Producto::all()
        ->where('activo',true);

        $medidas = vw_catalogos::all()
        ->where('nombre','Unidad_Medida');

        $parametros = Parametro::all();
       
        return view('ordenes.create', compact('tareas','tecnicos','clientes','productos','medidas','plantilla','parametros'));
     }

     public function edit(ordentrabajos $orden)
     { 
       
        $orden->estado_id=18; 
        $orden->save();

        ordentrabajotareas::where('orden_id',$orden->id)
        ->where('orden',1)
        ->update(['estado_id'=>'18']);
        
        $ordenestecnicos = ordentrabajotecnicos::all()
        ->where('orden_id',$orden->id);

        $tareas = ordentrabajotareas::all()
        ->where('orden_id',$orden->id);

        $ordenesmateriales = vw_materialesordenes::all()
        ->where('orden_id',$orden->id);
       
        $tecnicos = vw_empleados::all();
        $clientes = vw_clientes::all();

        $productos = Producto::all()
        ->where('activo',true);

        $parametros = Parametro::all();
       
        return view('ordenes.edit', compact('orden','tecnicos','clientes','productos','parametros','ordenestecnicos','ordenesmateriales','tareas'));
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        try
        {
            DB::beginTransaction();
            $orden = new ordentrabajos();
            $orden->empresa_id=1;//$request->empresa_id;       
            $orden->nombre=""; 
            $orden->cliente_id=$request->cliente_id; 
            $orden->fechaorden=Carbon::parse($request->fecha)->format('Y-m-d');         
           /*  $orden->fechainicio=Carbon::now();
            $orden->fechafin=Carbon::now();
            $orden->fechafactura=Carbon::now(); */

            $orden->anulada = false;
            $orden-> estado_id = 17;
            $orden->comentarios=$request->comentarios;       

            if (is_null($request->insumosoperativos)){$orden->insumosoperativos=false;}
            else{$orden->insumosoperativos=true;}

            if (is_null($request->manoobraexterna)){$orden->manoobraexterna=false;}
            else{$orden->manoobraexterna=true;}

            if (is_null($request->horasextras)){$orden->horasextras=false;}
            else{$orden->horasextras=true;} 
            
            $orden->tiempototal=0;
            $orden->grantotal=$request->grantotal; 
            $orden->grantotalsinadicional=$request->totalsinadicionales; 

            $orden->save();   
                     
            $tareas=$request->get('nombretarea');          
            $ordentareas=$request->get('orden');           
            $descripciones=$request->get('descripciontarea');

            $cont=0;

            while ($cont < count($tareas)){
                $ordentarea = new ordentrabajotareas();
                $ordentarea-> orden_id=$orden->id;
                $ordentarea-> tarea=$tareas[$cont]; 
                $ordentarea-> descripcion =  $descripciones[$cont];
                $ordentarea-> activo =  true;
                $ordentarea-> estado_id = 17;
                $ordentarea-> orden =  $ordentareas[$cont];
                $ordentarea-> save();                
                $cont = $cont +1;
            } 

            $tecnicos=$request->get('tecnicos');

            $conttecnicos=0;
            while ($conttecnicos < count($tecnicos)){
                $ordentecnico = new ordentrabajotecnicos();
                $ordentecnico-> orden_id=$orden->id;
                $ordentecnico-> tecnico_id=$tecnicos[$conttecnicos];
                $ordentecnico-> horasextras =0;                 
                $ordentecnico-> save();                
                $conttecnicos = $conttecnicos +1;
            }          
           
            $producto_id=$request->get('producto_id');
            $cantidades=$request->get('cantidades');
            $precios=$request->get('precios');
            $totales=$request->get('totales');

            $contmateriales=0;

            while ($contmateriales < count($producto_id)){
                $ordenmateriales = new ordentrabajomateriales();
                $ordenmateriales-> orden_id=$orden->id;
                $ordenmateriales-> material_id=$producto_id[$contmateriales];
                $ordenmateriales-> cantidad=$cantidades[$contmateriales];
                $ordenmateriales-> precio=$precios[$contmateriales];
                $ordenmateriales-> total=$totales[$contmateriales];

                $ordenmateriales-> save();                
                $contmateriales = $contmateriales +1;
            } 
 
            DB::commit();  
        
        }  
        catch(Exception $e){
            DB::rollback();
        } 
        
        $notification='La orden ha sido creada correctamente.';      
        return redirect('/ordenes')->with(compact('notification'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ordentrabajos $ordentrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ordentrabajos $ordentrabajo)
    {
        try
        {
            DB::beginTransaction();
            $orden = new ordentrabajos();
            $orden->empresa_id=1;//$request->empresa_id;       
            $orden->nombre=""; 
            $orden->cliente_id=$request->cliente_id; 
            $orden->fechaorden=Carbon::parse($request->fecha)->format('Y-m-d');         
           /*  $orden->fechainicio=Carbon::now();
            $orden->fechafin=Carbon::now();
            $orden->fechafactura=Carbon::now(); */

            $orden->anulada = false;
            $orden-> estado_id = 17;
            $orden->comentarios=$request->comentarios;       

            if (is_null($request->insumosoperativos)){$orden->insumosoperativos=false;}
            else{$orden->insumosoperativos=true;}

            if (is_null($request->manoobraexterna)){$orden->manoobraexterna=false;}
            else{$orden->manoobraexterna=true;}

            if (is_null($request->horasextras)){$orden->horasextras=false;}
            else{$orden->horasextras=true;} 
            
            $orden->tiempototal=0;
            $orden->grantotal=$request->grantotal; 
            $orden->grantotalsinadicional=$request->totalsinadicionales; 

            $orden->save();   
                     
            $tareas=$request->get('nombretarea');          
            $ordentareas=$request->get('orden');           
            $descripciones=$request->get('descripciontarea');

            $cont=0;

            while ($cont < count($tareas)){
                $ordentarea = new ordentrabajotareas();
                $ordentarea-> orden_id=$orden->id;
                $ordentarea-> tarea=$tareas[$cont]; 
                $ordentarea-> descripcion =  $descripciones[$cont];
                $ordentarea-> activo =  true;
                $ordentarea-> estado_id = 17;
                $ordentarea-> orden =  $ordentareas[$cont];
                $ordentarea-> save();                
                $cont = $cont +1;
            } 

            $tecnicos=$request->get('tecnicos');

            $conttecnicos=0;
            while ($conttecnicos < count($tecnicos)){
                $ordentecnico = new ordentrabajotecnicos();
                $ordentecnico-> orden_id=$orden->id;
                $ordentecnico-> tecnico_id=$tecnicos[$conttecnicos];
                $ordentecnico-> horasextras =0;                 
                $ordentecnico-> save();                
                $conttecnicos = $conttecnicos +1;
            }          
           
            $producto_id=$request->get('producto_id');
            $cantidades=$request->get('cantidades');
            $precios=$request->get('precios');
            $totales=$request->get('totales');

            $contmateriales=0;

            while ($contmateriales < count($producto_id)){
                $ordenmateriales = new ordentrabajomateriales();
                $ordenmateriales-> orden_id=$orden->id;
                $ordenmateriales-> material_id=$producto_id[$contmateriales];
                $ordenmateriales-> cantidad=$cantidades[$contmateriales];
                $ordenmateriales-> precio=$precios[$contmateriales];
                $ordenmateriales-> total=$totales[$contmateriales];

                $ordenmateriales-> save();                
                $contmateriales = $contmateriales +1;
            } 
 
            DB::commit();  
        
        }  
        catch(Exception $e){
            DB::rollback();
        } 
        
        $notification='La orden ha sido actualizada correctamente.';      
        return redirect('/ordenes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ordentrabajos $ordentrabajo)
    {
        //
    }
}
