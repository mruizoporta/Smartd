<?php

namespace App\Http\Controllers;

use App\Models\plantilla;
use App\Models\plantilladetalle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    { 
        return view('plantillas.create');
    }

    public function edit(plantilla $plantilla){ 
        return view('plantillas.edit', compact('plantilla'));        
     }


    public function index()
    {
        $plantillas= plantilla::all()
        ->where('activo',true);   

        return view('plantillas.index', compact('plantillas'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        try
        {
            DB::beginTransaction();
            $plantilla = new plantilla();
            $plantilla->empresa_id=1;//$request->empresa_id;       
            $plantilla->nombre=$request->nombre;  
            $plantilla->insumosoperativps=$request->insumosoperativps;   
            $plantilla->manoobraexterna=$request->manoobraexterna;   
            $plantilla->horasextras=$request->horasextras;                 
            $plantilla->save();
         
             //Insertamos el detalle de la plantolla
            $ids=$request->get('ids');
            $tareas=$request->get('tarea');
            $descripciones=$request->get('descripcion');
            $ordenes=$request->get('oden');
           
            $cont=0;

            while ($cont < count($tareas)){
                if ($ids[$cont]==0)
                {
                    $detalle = new plantilladetalle();
                    $detalle-> plantilla_id=$plantilla->id;
                    $detalle-> tarea=$tareas[$cont]; 
                    $detalle-> descripcion =  $descripciones[$cont];
                    $detalle-> orden =  $ordenes[$cont];
                    $detalle-> save();
                }
                $cont = $cont +1;
            }           

            DB::commit();  
        
        }  
        catch(Exception $e){
            DB::rollback();
        } 
        
        $notification='La plantilla ha sido creada correctamente.';      
        return redirect('/plantillas')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(plantilla $plantilla)
    {
        //
    }

    public function update(Request $request, plantilla $plantilla)   {
        // return $request;
         try
         {
             DB::beginTransaction();
             $plantilla->empresa_id=1;//$request->empresa_id;       
             $plantilla->nombre=$request->nombre;  
             $plantilla->insumosoperativps=$request->insumosoperativps;   
             $plantilla->manoobraexterna=$request->manoobraexterna;   
             $plantilla->horasextras=$request->horasextras;                
             $plantilla->save();
 
             //Eliminamos los valores  
             DB::table('plantilladetalles')->where('plantilla_id', '=', $plantilla->id)->delete();
               
              //Insertamos los productos nuevos
             $ids=$request->get('ids');
             $tareas=$request->get('tarea');
             $descripciones=$request->get('descripcion');
             $ordenes=$request->get('oden');
            
             $cont=0;
 
             while ($cont < count($tareas)){
                 if ($ids[$cont]==0)
                 {
                     $detalle = new plantilladetalle();
                     $detalle-> plantilla_id=$plantilla->id;
                     $detalle-> tarea=$tareas[$cont]; 
                     $detalle-> descripcion =  $descripciones[$cont];
                     $detalle-> orden =  $ordenes[$cont];
                     $detalle-> save();
                 }
                 $cont = $cont +1;
             }           
 
             DB::commit();  
         
         }  
         catch(Exception $e){
             DB::rollback();
         }
     
         $notification='La plantilla ha sido actualizada correctamente.';      
         return redirect('/plantillas')->with(compact('notification'));
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(plantilla $plantilla)
     {
         $plantilla->activo=false;     
         $plantilla->save();
         $notification='La plantilla ha sido inactivada correctamente.';      
         return redirect('/plantillas')->with(compact('notification'));
     }
}
