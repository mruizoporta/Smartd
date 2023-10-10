<?php

namespace App\Http\Controllers;

use App\Models\plantillas;
use App\Models\plantilladetalles;
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

    public function edit(plantillas $plantilla){ 

        $detalles = plantilladetalles::select("*")
        ->where('plantilla_id',$plantilla->id)      
        ->get();  
       
        return view('plantillas.edit', compact('plantilla','detalles'));        
     }


    public function index()
    {
        $plantillas= plantillas::all()
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
            $plantilla = new plantillas();
            $plantilla->empresa_id=1;//$request->empresa_id;       
            $plantilla->nombre=$request->nombre; 

            if (is_null($request->insumosoperativos)){$plantilla->insumosoperativos=false;}
            else{$plantilla->insumosoperativos=true;}

            if (is_null($request->manoobraexterna)){$plantilla->manoobraexterna=false;}
            else{$plantilla->manoobraexterna=true;}

            if (is_null($request->horasextras)){$plantilla->horasextras=false;}
            else{$plantilla->horasextras=true;} 
                                    
            $plantilla->save();         
            
             //Insertamos el detalle de la plantilla           
            $tareas=$request->get('tarea');
            $descripciones=$request->get('descripcion');
            $ordenes=$request->get('orden');
           
            $cont=0;

            while ($cont < count($tareas)){
                $detalle = new plantilladetalles();
                $detalle-> plantilla_id=$plantilla->id;
                $detalle-> tarea=$tareas[$cont]; 
                $detalle-> descripcion =  $descripciones[$cont];
                $detalle-> orden =  $ordenes[$cont];
                $detalle-> save();                
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
    public function show(plantillas $plantilla)
    {
        //
    }

    public function update(Request $request, plantillas $plantilla)   {
        // return $request;
         try
         {
             DB::beginTransaction();
             $plantilla->empresa_id=1;//$request->empresa_id;       
             $plantilla->nombre=$request->nombre;  
             
             if (is_null($request->insumosoperativos)){$plantilla->insumosoperativos=false;}
             else{$plantilla->insumosoperativos=true;}
 
             if (is_null($request->manoobraexterna)){$plantilla->manoobraexterna=false;}
             else{$plantilla->manoobraexterna=true;}
 
             if (is_null($request->horasextras)){$plantilla->horasextras=false;}
             else{$plantilla->horasextras=true;}               
             $plantilla->save();
 
             //Eliminamos los valores  
            // DB::table('plantilladetalles')->where('plantilla_id', '=', $plantilla->id)->delete();
               
             //Insertamos el detalle de la plantilla           
             $tareas=$request->get('tarea');
             $descripciones=$request->get('descripcion');
             $ordenes=$request->get('orden');
            
             $cont=0;
 
             while ($cont < count($tareas)){
                 $detalle = new plantilladetalles();
                 $detalle-> plantilla_id=$plantilla->id;
                 $detalle-> tarea=$tareas[$cont]; 
                 $detalle-> descripcion =  $descripciones[$cont];
                 $detalle-> orden =  $ordenes[$cont];
                 $detalle-> save();                
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
     public function destroy(plantillas $plantilla)
     {
         $plantilla->activo=false;     
         $plantilla->save();
         $notification='La plantilla ha sido inactivada correctamente.';      
         return redirect('/plantillas')->with(compact('notification'));
     }
}
