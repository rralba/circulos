<?php

namespace App\Http\Controllers;

use App\empleado;
use App\propuesta;
use App\attach;
use App\integrantes_propuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DB;

class PropuestaController extends Controller
{

    public function index()
    {
        return view('propuesta');
    }

    public function list1()
    {
        $propuesta1 = DB::table('propuestas')
        ->where('identificador', '=', '1')->paginate(10);
        
        return view('propuestas.list1', compact('propuesta1'));
        //dd($propuesta);
    }

    public function list2()
    {
       $propuesta2 = DB::table('propuestas')
        ->where('identificador', '=', '2')->paginate(10);
        
        return view('propuestas.list2', compact('propuesta2'));
        //dd($propuesta);
    }

    public function list3()
    {
        $propuesta3 = DB::table('propuestas')
        ->where('identificador', '=', '3')->paginate(10);
        
        return view('propuestas.list3', compact('propuesta3'));
        //dd($propuesta);
    }

    public function list4()
    {
        $propuesta4 = DB::table('propuestas')
        ->where('identificador', '=', '4')->paginate(10);
        
        return view('propuestas.list4', compact('propuesta4'));
        //dd($propuesta);
    }

    public function update(propuesta $propuesta)
    {
        // $prop = DB::table('propuestas')
        // ->where('id', '=', $propuesta)
        // ->get();
        // $prop1 = json_encode($prop);
        return view('propuestas.update', compact('propuesta'));
        //dd($prop);
    }

    public function validat(propuesta $propuesta, integrantes_propuesta $integrante)
    {
        return view('propuestas.validate', compact('propuesta', 'integrante'));
        //dd($propuesta);
    }

    public function edit(Request $request)
    {
      $propuesta = propuesta::where('id', '=', $request->id)->first();
      $propuesta->asesor = $request->input('asesor');
      $propuesta->asignacion = $request->input('asignacion');
      if(($request->identificador) == 1)
      {
        $propuesta->identificador = 3;
      }
      if(($request->identificador) == 2)
      {
        $propuesta->identificador = 4;
      }
      $propuesta->save();
      return redirect()->route('propuesta1.index');
      //dd($request->all());
    }

    public function store(Request $request)
    {
        $propuesta = new propuesta();
        if(($request->identificador) == 1)
        {
          if(($request->asesor) == "N/A")
          {
            $propuesta->identificador = $request->input('identificador');
          }
          else
          {
            $propuesta->identificador = 3;
          }
        }
        if(($request->identificador) == 2)
        {
          if(($request->asesor) == "N/A")
          {
            $propuesta->identificador = $request->input('identificador');
          }
          else
          {
            $propuesta->identificador = 4;
          }
        }
          $propuesta->registro = $request->input('registroprop');
          $propuesta->direccion = $request->input('direccion');
          $propuesta->subdireccion = $request->input('subdireccion');
          $propuesta->departamento = $request->input('departamento');
          $propuesta->contacto = $request->input('contacto');
          $propuesta->clave = $request->input('clave');
          $propuesta->extension = $request->input('extension');
          $propuesta->id_autoriza = $request->input('id_autoriza');
          $propuesta->inicio = $request->input('inicio');
          $propuesta->final = $request->input('final');
          $propuesta->asesor = $request->input('asesor');
          $propuesta->proyecto = $request->input('proyecto');
          $propuesta->creativo = $request->input('creativo');
          $propuesta->areas_part = $request->input('areas_part');
          $propuesta->skills_integ = $request->input('skills_integ');
          $propuesta->conocimiento_critico = $request->input('conocimiento_critico');
          $propuesta->sindicalizados = $request->input('sindicalizados');
          $propuesta->principales_act = $request->input('principales_act');
          $propuesta->beneficio_eco = $request->input('beneficio_eco');
          $propuesta->mejorar = $request->input('mejorar');
          $propuesta->objetivo = $request->input('objetivo');
          $propuesta->solucion = $request->input('solucion');
          $propuesta->save();
        
        
        if (($request->identificador) == 1) 
        {
        	foreach ($request->integp as $inte) 
        	{
            $integ[] = 0;
            if (in_array($inte, $integ)){
              if (($inte) == 0)
              {
                $propid = propuesta::all();
                $x = ($propid->last());
                $integrante = new integrantes_propuesta();
                $integrante->propuesta_id = $x->id;
                $integrante->empleado_id = $inte;
                $integrante->save();
                $r[] = array($inte);   
              }
            }
            else{
        		if (($inte) > 0){
              $integ[] = $inte;
        			$propid = propuesta::all();
        			$x = ($propid->last());
        			$integrante = new integrantes_propuesta();
        			$integrante->propuesta_id = $x->id;
        			$integrante->empleado_id = $inte;
        			$integrante->save();
        			$r[] = array($inte);
        		 }
            }	
        	}
        }
        else
        {
        	if (($request->identificador) == 2)
		        {
  		        foreach ($request->integm as $inte) 
                {
                  $integ[] = 0;
                  if (in_array($inte, $integ)){
                    if (($inte) == 0)
                    {
                      $propid = propuesta::all();
                      $x = ($propid->last());
                      $integrante = new integrantes_propuesta();
                      $integrante->propuesta_id = $x->id;
                      $integrante->empleado_id = $inte;
                      $integrante->save();
                      $r[] = array($inte);   
                    }
                  }
                  else{
                    if (($inte) > 0){
                      $integ[] = $inte;
                      $propid = propuesta::all();
                      $x = ($propid->last());
                      $integrante = new integrantes_propuesta();
                      $integrante->propuesta_id = $x->id;
                      $integrante->empleado_id = $inte;
                      $integrante->save();
                      $r[] = array($inte);
                    }
                  } 
                }
		        }
        }

        foreach($request->files as $imagen)
        {
          $i = $imagen;
            foreach ($i as $image)
              {
                $propid = propuesta::all();
                $x = ($propid->last());
                $images = new attach();
                $images->propuesta_id = $x->id;
                $nombre =  time()."_".$image->getClientOriginalName();
                \Storage::disk('local')->put($nombre,  \File::get($image));
                $images->attach_path = $nombre;
                $images->save();
              }
        }
        return redirect()->route('propuesta.resumen',[$propuesta]);
        //dd($request->all());
    }

    public function resumen(propuesta $propuesta)
    {
      //dd($propuesta);
      return view('resumen', compact('propuesta'));
    }


    /*
   AJAX request
   */
   public function getEmployees(Request $request){

      $search = $request->search;

      if($search == ''){
         $employees = empleado::orderby('nombre','asc')->select('id','nombre','posicion')->limit(5)->get();
      }else{
         $employees = empleado::orderby('nombre','asc')->select('id','nombre','posicion','depto','cia','direccion')->where('nombre', 'like', '%' .$search . '%')->limit(20)->get();
      }

      $response = array();
      foreach($employees as $employee){
         $response[] = array("value"=>$employee->id,"label"=>$employee->nombre,"depto"=>$employee->posicion,"depa"=>$employee->depto,"cia"=>$employee->cia,"dir"=>$employee->direccion);
      }

      return response()->json($response);
   }
}
