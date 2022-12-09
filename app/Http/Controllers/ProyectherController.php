<?php

namespace App\Http\Controllers;
use App\proyectsher;
use App\beneficiosher;
use Illuminate\Support\Arr;
use DB;
use Illuminate\Http\Request;

class ProyectherController extends Controller
{
    public function index()
    {
        $proyects = DB::table('proyectshers')
        ->get();
        return view('proyectsher.index', compact('proyects'));
        // dd($proyect->all());
    }
    public function store(Request $request)
    {
        $proyect = proyectsher::create($request->all());
        return redirect()->back()
        ->with('info', 'Proyecto guardado con exito');
        //dd($request->all());
    }
     public function show(proyectsher $proyect)
    {   
       return view('proyectsher.show', compact('proyect'));
    }
    public function edit(proyectsher $proyect)
    { 
        return view('proyectsher.edit', compact('proyect'));   
    }
    public function update(Request $request)
    {   
    	$filtro = proyectsher::where('id', '=', $request->id)->first();
        $current_date = date('Y-m-d');
        $proyectos = proyectsher::where('id', '=', $request->id)->first();
        $proyectos->proyecto = $request->input('proyecto');
        $proyectos->depto = $request->input('depto');
        $proyectos->nivel = $request->input('nivel');
        $proyectos->comite = $request->input('comite');
        $proyectos->asesor = $request->input('asesor');
        $proyectos->fecha_ini = $request->input('inicio');
        $proyectos->fecha_fin = $request->input('final');
        $proyectos->valor = $request->input('valor');
        $proyectos->metodologia = $request->input('metodologia');
        if(($request->input('beneficio_eco'))> 0){
            $proyectos->ahorro_anual_proy = $request->input('beneficio_eco');
        }
        $proyectos->proy_status = $request->input('proy_status');
        if(($request->input('proy_status')) == 3){
            if(($filtro->proy_status) <> 3){
                $proyectos->fecha_finreal = $current_date;
            }
        }
        $proyectos->save();
        return redirect()->back()->with('info', 'Proyecto Actualizado');
        //dd($proyectos);
    }
    public function beneindex(Request $request, proyectsher $proyect, beneficiosher $beneficio)
    {
        $data = db::table('proyectshers')
        ->join('beneficioshers', 'proyectshers.id', '=', 'beneficioshers.proyect_id')
        ->select('beneficioshers.*')
        ->where('beneficioshers.proyect_id', '=',$proyect->id)
        ->where('beneficioshers.status', '<>', '2')
        ->groupBy('id')
        ->get();
        return view('proyectsher.beneficios', compact('data', 'proyect', 'beneficio', 'request'));
        // dd($data->all());  
    }
    public function addbenef(Request $request)
    {
        $beneficio = new beneficiosher();
        $beneficio->proyect_id = $request->input('proyect_id');
        $beneficio->fecha_gen = $request->input('fecha_gen');
        $beneficio->beneficio = $request->input('beneficio');
        $beneficio->save();
        return redirect()->back();
        // dd($beneficio->all());
    }
     public function benupdate(Request $request, beneficiosher $beneficio)
    {
        $beneficio = beneficiosher::where('id', '=', $request->id)->first();
        $beneficio->fecha_gen = $request->input('fechagen');
        $beneficio->beneficio = $request->input('benef');
        $beneficio->save();
        return redirect()->back()->with('info', 'Beneficio Actualizado');
        // dd($request->all());
    }
    public function benefdestroy(Request $request)
    {
        $data = $request->all();
        $delete = beneficiosher::where('id' ,$data['pinn'])->delete();
        return redirect()->back();
        // dd($request->all());
    }
}
