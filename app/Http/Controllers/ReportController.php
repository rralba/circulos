<?php

namespace App\Http\Controllers;

use App\Proyect;
use App\integrant;
use App\empleado;
use App\beneficio;
use App\mejora;
use App\reconocimiento;
use Illuminate\Http\Request;
use Maatwebsite\Excel\facades\Excel;
use App\Exports\ProyectsExport;
use App\Exports\MejorasExport;
use DB;

class ReportController extends Controller
{
	public function index()
    {
    	return view('reportes.index');
    }

	public function proyectexcel( Request $request)
    {
    	$status = $request->identificador;
    	//$status = (int)$status1;
    	//dd($status);
    	if (($status) == 1){
        	return (new ProyectsExport($status))->download('proyectos activos.xlsx');
    	}
    	if (($status) == 2){
        	return (new ProyectsExport($status))->download('proyectos terminados.xlsx');
    	}
    	if (($status) == 3){
        	return (new ProyectsExport($status))->download('proyectosen procesodepago.xlsx');
    	}
    	if (($status) == 0){
        	return (new ProyectsExport($status))->download('proyectos cancelados.xlsx');
    	}
    	if (($status) > 3){
        	return (new ProyectsExport($status))->download('proyectos.xlsx');
    	}
    }

    public function mejorasexcel( Request $request)
    {
    	$status = $request->identificador;
    	//$status = (int)$status1;
    	//dd($status);
    	if (($status) == 1){
        	return (new MejorasExport($status))->download('mejoras rapidas activos.xlsx');
    	}
    	if (($status) == 3){
        	return (new MejorasExport($status))->download('mejoras rapidas terminados.xlsx');
    	}
    	if (($status) == 0){
        	return (new MejorasExport($status))->download('mejoras rapidas cancelados.xlsx');
    	}
    	if (($status) > 3){
        	return (new MejorasExport($status))->download('mejoras rapidas.xlsx');
    	}
    }

    public function semanal()
    {
        return view('reportes.semanal');
    }

    public function data( Request $request)
    {
        $mrproceso = db::table('mejoras')
        ->select('id')
        ->where('status','=','1')
        ->count();
        $mrterminadas = db::table('mejoras')
        ->select('id','asesor')
        ->where('status','>','1')
        ->wheredate("fecha_terminacion",">=",$request->iniciors)
        ->wheredate("fecha_terminacion","<=",$request->finalrs)
        ->get();
        $mrt = json_encode($mrterminadas);
        $mrnuevas = db::table('mejoras')
        ->select('id','asesor')
        ->where('status','=','1')
        ->wheredate("created_at",">=",$request->iniciors)
        ->wheredate("created_at","<=",$request->finalrs)
        ->get();
        $mnew = db::table('mejoras')
        ->select('id')
        ->where('status','<>','0')
        ->whereYear("fecha_terminacion",">=",$request->iniciors)
        ->count();
        $orlandom = $mrnuevas
        ->whereIn('asesor',['ING. ORLANDO GUERRA','Ing. Orlando Guerra'])
        ->count();
        $checom = $mrnuevas
        ->whereIn('asesor',['ING. SERGIO CAMACHO','Ing. Sergio Camacho'])
        ->count();
        $isabelam = $mrnuevas
        ->whereIn('asesor',['ING. ISABELA SAN MIGUEL','Ing. Isabela San Miguel'])
        ->count();
        $edithm = $mrnuevas
        ->whereIn('asesor',['ING. EDITH RAMOS','Ing. Edith Ramos'])
        ->count();
        $adrianam = $mrnuevas
        ->whereIn('asesor',['ING. ADRIANA REYES','Ing. Adriana Reyes'])
        ->count();

        $orlandomt = $mrterminadas
        ->whereIn('asesor',['ING. ORLANDO GUERRA','Ing. Orlando Guerra'])
        ->count();
        $checomt = $mrterminadas
        ->whereIn('asesor',['ING. SERGIO CAMACHO','Ing. Sergio Camacho'])
        ->count();
        $isabelamt = $mrterminadas
        ->whereIn('asesor',['ING. ISABELA SAN MIGUEL','Ing. Isabela San Miguel'])
        ->count();
        $edithmt = $mrterminadas
        ->whereIn('asesor',['ING. EDITH RAMOS','Ing. Edith Ramos'])
        ->count();
        $adrianamt = $mrterminadas
        ->whereIn('asesor',['ING. ADRIANA REYES','Ing. Adriana Reyes'])
        ->count();

        $pyproceso = db::table('proyects')
        ->select('id','depto','nivel')
        ->where('proy_status','=','1')
        ->get();
        $pydepto = db::table('proyects')
        ->select('depto')
        ->where('proy_status','>','1')
        ->groupBy('depto')
        ->get();
        $array = json_encode($pydepto);
        $pycont=count($pyproceso);
        $pyn1 = $pyproceso
        ->where('nivel','=','1')
        ->count();
        $pyn2 = $pyproceso
        ->where('nivel','=','2')
        ->count();
        $pynuevos = db::table('proyects')
        ->select('id','asesor')
        ->where('proy_status','=','1')
        ->wheredate("created_at",">=",$request->iniciors)
        ->wheredate("created_at","<=",$request->finalrs)
        ->get();
        $pnew = db::table('proyects')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("created_at",">=",$request->iniciors)
        ->count();
        $pfin = db::table('proyects')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("fecha_finreal",">=",$request->iniciors)
        ->count();
        $orlando = $pynuevos
        ->whereIn('asesor',['ING. ORLANDO GUERRA','Ing. Orlando Guerra'])
        ->count();
        $checo = $pynuevos
        ->whereIn('asesor',['ING. SERGIO CAMACHO','Ing. Sergio Camacho'])
        ->count();
        $isabela = $pynuevos
        ->whereIn('asesor',['ING. ISABELA SAN MIGUEL','Ing. Isabela San Miguel'])
        ->count();
        $edith = $pynuevos
        ->whereIn('asesor',['ING. EDITH RAMOS','Ing. Edith Ramos'])
        ->count();
        $adriana = $pynuevos
        ->whereIn('asesor',['ING. ADRIANA REYES','Ing. Adriana Reyes'])
        ->count();

        $finsem = db::table('proyects')
        ->select('id','asesor')
        ->where('proy_status','<>','0')
        ->wheredate("fecha_finreal",">=",$request->iniciors)
        ->wheredate("fecha_finreal","<=",$request->finalrs)
        ->get();
        $orlandopfs = $finsem
        ->whereIn('asesor',['ING. ORLANDO GUERRA','Ing. Orlando Guerra'])
        ->count();
        $checopfs = $finsem
        ->whereIn('asesor',['ING. SERGIO CAMACHO','Ing. Sergio Camacho'])
        ->count();
        $isabelapfs = $finsem
        ->whereIn('asesor',['ING. ISABELA SAN MIGUEL','Ing. Isabela San Miguel'])
        ->count();
        $edithpfs = $finsem
        ->whereIn('asesor',['ING. EDITH RAMOS','Ing. Edith Ramos'])
        ->count();
        $adrianapfs = $finsem
        ->whereIn('asesor',['ING. ADRIANA REYES','Ing. Adriana Reyes'])
        ->count();
        $benefsem = beneficio::wheredate("created_at",">=",$request->iniciors)->wheredate("created_at","<=",$request->finalrs)->sum('beneficio');
        $bensem = $benefsem/1000000;
        $mes = substr($request->iniciors,5,2);
        $benefanual = beneficio::whereYear("fecha_gen","=",$request->iniciors)->sum('beneficio');
        $sub = $benefanual/1000000;
        $benefmensual = beneficio::whereYear("fecha_gen","=",$request->iniciors)->whereMonth("created_at","=",$mes)->sum('beneficio');
        $subm = $benefmensual/1000000;

        $mrsem = mejora::wheredate("fecha_terminacion",">=",$request->iniciors)->wheredate("fecha_terminacion","<=",$request->finalrs)->sum('beneficio');
        $mrs = $mrsem/1000000;
        $mrmes = mejora::whereYear("fecha_terminacion","=",$request->iniciors)->whereMonth("fecha_terminacion","=",$mes)->sum('beneficio');
        $mrm = $mrmes/1000000;

        $data = db::table('proyects')
        ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
        ->select('beneficios.*','proyects.proyecto','proyects.depto')
        ->wheredate("beneficios.created_at",">=",$request->iniciors)
        ->wheredate("beneficios.created_at","<=",$request->finalrs)
        ->get();

        return view('reportes.semanal', compact('data','mrproceso','mrterminadas','mrnuevas','orlandom','checom','isabelam','edithm','adrianam','pyproceso','pydepto','pycont','pyn1','pyn2','pynuevos','orlando','checo','isabela','edith','adriana','orlandomt','checomt','isabelamt','edithmt','adrianamt','pnew','mnew','sub','subm','bensem','mrs','mrm','array','mrt','pfin','finsem','orlandopfs','checopfs','isabelapfs','edithpfs','adrianapfs'));
        //dd($finsem); 
    }
}
