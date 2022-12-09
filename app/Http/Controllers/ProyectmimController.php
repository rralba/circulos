<?php

namespace App\Http\Controllers;
use App\proyectsmim;
use App\beneficiosmim;
use Illuminate\Support\Arr;
use DB;
use Illuminate\Http\Request;

class ProyectmimController extends Controller
{
    public function index()
    {
        $proyects = DB::table('proyectsmims')
        ->get();
        return view('proyectsmim.index', compact('proyects'));
        // dd($proyect->all());
    }
    public function store(Request $request)
    {
        $proyect = proyectsmim::create($request->all());
        return redirect()->back()
        ->with('info', 'Proyecto guardado con exito');
        //dd($request->all());
    }
     public function show(proyectsmim $proyect)
    {   
       return view('proyectsmim.show', compact('proyect'));
    }
    public function edit(proyectsmim $proyect)
    { 
        return view('proyectsmim.edit', compact('proyect'));   
    }
    public function update(Request $request)
    {   
        $filtro = proyectsmim::where('id', '=', $request->id)->first();
        $current_date = date('Y-m-d');
        $proyectos = proyectsmim::where('id', '=', $request->id)->first();
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
    public function beneindex(Request $request, proyectsmim $proyect, beneficiosmim $beneficio)
    {
        $data = db::table('proyectsmims')
        ->join('beneficiosmims', 'proyectsmims.id', '=', 'beneficiosmims.proyect_id')
        ->select('beneficiosmims.*')
        ->where('beneficiosmims.proyect_id', '=',$proyect->id)
        ->where('beneficiosmims.status', '<>', '2')
        ->groupBy('id')
        ->get();
        return view('proyectsmim.beneficios', compact('data', 'proyect', 'beneficio', 'request'));
        // dd($data->all());  
    }
    public function addbenef(Request $request)
    {
        $beneficio = new beneficiosmim();
        $beneficio->proyect_id = $request->input('proyect_id');
        $beneficio->fecha_gen = $request->input('fecha_gen');
        $beneficio->beneficio = $request->input('beneficio');
        $beneficio->save();
        return redirect()->back();
        // dd($beneficio->all());
    }
     public function benupdate(Request $request, beneficiosmim $beneficio)
    {
        $beneficio = beneficiosmim::where('id', '=', $request->id)->first();
        $beneficio->fecha_gen = $request->input('fechagen');
        $beneficio->beneficio = $request->input('benef');
        $beneficio->save();
        return redirect()->back()->with('info', 'Beneficio Actualizado');
        // dd($request->all());
    }
    public function benefdestroy(Request $request)
    {
        $data = $request->all();
        $delete = beneficiosmim::where('id' ,$data['pinn'])->delete();
        return redirect()->back();
        // dd($request->all());
    }
}
