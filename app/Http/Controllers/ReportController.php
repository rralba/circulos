<?php

namespace App\Http\Controllers;

use App\Proyect;
use App\proyectsher;
use App\proyectsmim;
use App\proyectsnas;
use App\integrant;
use App\empleado;
use App\beneficio;
use App\beneficiosher;
use App\beneficiosmim;
use App\beneficiosnas;
use App\mejora;
use App\reconocimiento;
use App\propuesta;
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
        $mrn = json_encode($mrnuevas);
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
        $pyprocesom = db::table('proyectsmims')
        ->select('id','depto','nivel')
        ->where('proy_status','=','1')
        ->count();
        $pyproceson = db::table('proyectsnas')
        ->select('id','depto','nivel')
        ->where('proy_status','=','1')
        ->count();
        $pyprocesoh = db::table('proyectshers')
        ->select('id','depto','nivel')
        ->where('proy_status','=','1')
        ->count();
        $pydepto = db::table('proyects')
        ->select('depto')
        ->where('proy_status','>','1')
        ->groupBy('depto')
        ->get();
        $array = json_encode($pydepto);
        $pycont=count($pyproceso);
        $pycontf = $pyprocesom + $pyproceson + $pyprocesoh;
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
        $pynuevosh = db::table('proyectshers')
        ->select('id','asesor')
        ->where('proy_status','=','1')
        ->wheredate("created_at",">=",$request->iniciors)
        ->wheredate("created_at","<=",$request->finalrs)
        ->count();
        $pynuevosm = db::table('proyectsmims')
        ->select('id','asesor')
        ->where('proy_status','=','1')
        ->wheredate("created_at",">=",$request->iniciors)
        ->wheredate("created_at","<=",$request->finalrs)
        ->count();
        $pynuevosn = db::table('proyectsnas')
        ->select('id','asesor')
        ->where('proy_status','=','1')
        ->wheredate("created_at",">=",$request->iniciors)
        ->wheredate("created_at","<=",$request->finalrs)
        ->count();
        $pnewa = db::table('proyects')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("created_at",">=",$request->iniciors)
        ->count();
        $pnewm = db::table('proyectsmims')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("created_at",">=",$request->iniciors)
        ->count();
        $pnewn = db::table('proyectsnas')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("created_at",">=",$request->iniciors)
        ->count();
        $pnewh = db::table('proyectshers')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("created_at",">=",$request->iniciors)
        ->count();
        $pnew = $pnewa+$pnewm+$pnewn+$pnewh;
        $pfina = db::table('proyects')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("fecha_finreal",">=",$request->iniciors)
        ->count();
        $pfinm = db::table('proyectsmims')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("fecha_finreal",">=",$request->iniciors)
        ->count();
        $pfinn = db::table('proyectsnas')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("fecha_finreal",">=",$request->iniciors)
        ->count();
        $pfinh = db::table('proyectshers')
        ->select('id')
        ->where('proy_status','<>','0')
        ->whereYear("fecha_finreal",">=",$request->iniciors)
        ->count();
        $pfin = $pfina+$pfinm+$pfinn+$pfinh;
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
        $finsemh = db::table('proyectshers')
        ->select('id','asesor')
        ->where('proy_status','<>','0')
        ->wheredate("fecha_finreal",">=",$request->iniciors)
        ->wheredate("fecha_finreal","<=",$request->finalrs)
        ->count();
        $finsemm = db::table('proyectsmims')
        ->select('id','asesor')
        ->where('proy_status','<>','0')
        ->wheredate("fecha_finreal",">=",$request->iniciors)
        ->wheredate("fecha_finreal","<=",$request->finalrs)
        ->count();
        $finsemn = db::table('proyectsnas')
        ->select('id','asesor')
        ->where('proy_status','<>','0')
        ->wheredate("fecha_finreal",">=",$request->iniciors)
        ->wheredate("fecha_finreal","<=",$request->finalrs)
        ->count();
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
        $benefsemh = beneficiosher::wheredate("created_at",">=",$request->iniciors)->wheredate("created_at","<=",$request->finalrs)->sum('beneficio');
        $bensemh = $benefsemh/1000000;
        $benefsemn = beneficiosnas::wheredate("created_at",">=",$request->iniciors)->wheredate("created_at","<=",$request->finalrs)->sum('beneficio');
        $bensemn = $benefsemn/1000000;
        $benefsemm = beneficiosmim::wheredate("created_at",">=",$request->iniciors)->wheredate("created_at","<=",$request->finalrs)->sum('beneficio');
        $bensemm = $benefsemm/1000000;
        $mes = substr($request->iniciors,5,2);

        $benefanuala = beneficio::whereYear("fecha_gen","=",$request->iniciors)->sum('beneficio');
        $suba = $benefanuala/1000000;
        $benefanualm = beneficiosmim::whereYear("fecha_gen","=",$request->iniciors)->sum('beneficio');
        $submim = $benefanualm/1000000;
        $benefanualn = beneficiosnas::whereYear("fecha_gen","=",$request->iniciors)->sum('beneficio');
        $subn = $benefanualn/1000000;
        $benefanualh = beneficiosher::whereYear("fecha_gen","=",$request->iniciors)->sum('beneficio');
        $subh = $benefanualh/1000000;
        $benefmr = mejora::whereYear("fecha_terminacion","=",$request->iniciors)->sum('beneficio');
        $submr = $benefmr/1000000;
        $sub = $suba+$submim+$subn+$subh+$submr;

        $benefmensual = beneficio::whereYear("fecha_gen","=",$request->iniciors)->whereMonth("created_at","=",$mes)->sum('beneficio');
        $subm = $benefmensual/1000000;
        $benefmensualh = beneficiosher::whereYear("fecha_gen","=",$request->iniciors)->whereMonth("created_at","=",$mes)->sum('beneficio');
        $submh = $benefmensualh/1000000;
        $benefmensualm = beneficiosmim::whereYear("fecha_gen","=",$request->iniciors)->whereMonth("created_at","=",$mes)->sum('beneficio');
        $submm = $benefmensualm/1000000;
        $benefmensualn = beneficiosnas::whereYear("fecha_gen","=",$request->iniciors)->whereMonth("created_at","=",$mes)->sum('beneficio');
        $submn = $benefmensualn/1000000;
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
        $datah = db::table('proyectshers')
        ->join('beneficioshers', 'proyectshers.id', '=', 'beneficioshers.proyect_id')
        ->select('beneficioshers.*','proyectshers.proyecto','proyectshers.depto')
        ->wheredate("beneficioshers.created_at",">=",$request->iniciors)
        ->wheredate("beneficioshers.created_at","<=",$request->finalrs)
        ->get();
        $datan = db::table('proyectsnas')
        ->join('beneficiosnas', 'proyectsnas.id', '=', 'beneficiosnas.proyect_id')
        ->select('beneficiosnas.*','proyectsnas.proyecto','proyectsnas.depto')
        ->wheredate("beneficiosnas.created_at",">=",$request->iniciors)
        ->wheredate("beneficiosnas.created_at","<=",$request->finalrs)
        ->get();
        $datam = db::table('proyectsmims')
        ->join('beneficiosmims', 'proyectsmims.id', '=', 'beneficiosmims.proyect_id')
        ->select('beneficiosmims.*','proyectsmims.proyecto','proyectsmims.depto')
        ->wheredate("beneficiosmims.created_at",">=",$request->iniciors)
        ->wheredate("beneficiosmims.created_at","<=",$request->finalrs)
        ->get();
        $proppy =db::table('propuestas')
        ->select('id','identificador')
        ->whereIn('identificador',['1','3'])
        ->count();
        $propmr =db::table('propuestas')
        ->select('id','identificador')
        ->whereIn('identificador',['2','4'])
        ->count();
        return view('reportes.semanal', compact('data','datah','datan','datam','mrproceso','mrterminadas','mrnuevas','orlandom','checom','isabelam','edithm','adrianam','pyproceso','pydepto','pycont','pyn1','pyn2','pynuevos','orlando','checo','isabela','edith','adriana','orlandomt','checomt','isabelamt','edithmt','adrianamt','pnew','mnew','sub','subm','submh','submn','submm','bensem','bensemh','bensemn','bensemm','mrs','mrm','array','mrt','pfin','finsem','orlandopfs','checopfs','isabelapfs','edithpfs','adrianapfs','pyprocesom','pyproceson','pyprocesoh','pycontf','finsemh','finsemm','finsemn','pynuevosh','pynuevosm','pynuevosn','mrn','proppy','propmr'));
        //dd($sub, $suba, $submim, $subn, $subh); 
    }
}