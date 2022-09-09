<?php

namespace App\Http\Controllers;

use App\integrant;
use App\empleado;
use App\beneficio;
use App\reconocimiento;
use App\mejora;
use App\propuesta;
use App\Proyect;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DB;

class MejorasrapidasController extends Controller
{
    public function canceladas()
    {
        $mejoras = DB::table('mejoras')
        ->where('status', '=', '0')->paginate(10);
        return view('mejorasrapidas.canceladas', compact('mejoras'));
        //dd($mejoras->all());
    }

    public function index()
    {
        $mejoras = DB::table('mejoras')
        ->where('status', '=', '1')->paginate(10);
        return view('mejorasrapidas.index', compact('mejoras'));
       	//dd($mejoras->all());
    }

    public function terminadas()
    {
        $mejoras = DB::table('mejoras')
        ->where('status', '=', '2')->paginate(10);
        return view('mejorasrapidas.terminadas', compact('mejoras'));
        //dd($mejoras->all());
    }

    public function pagadas()
    {
        $mejoras = DB::table('mejoras')
        ->where('status', '=', '3')->paginate(10);
        return view('mejorasrapidas.pagadas', compact('mejoras'));
        //dd($mejoras->all());
    }

    public function procesopago(mejora $mejora)
    {
        $mejoras = DB::table('mejoras')
        ->where('status', '=', '4')->paginate(20);
        $mrint = db::table('mejoras')
        ->select('mejoras.id','mejoras.ppp','mejoras.status','integrants.empleado_id','empleados.nombre','empleados.cia','empleados.nivel')
        ->join('integrants','mejoras.id','=','integrants.mejora_id')
        ->join('empleados','integrants.empleado_id','=','empleados.id')
        ->where('mejoras.status','=','4')
        ->where('integrants.empleado_id','>','0')
        ->orderBy('empleado_id','asc')
        ->get();
        $mrid = db::table('mejoras')
        ->select('integrants.empleado_id')
        ->join('integrants','mejoras.id','=','integrants.mejora_id')
        ->where('mejoras.status','=','4')
        ->where('integrants.empleado_id','>','0')
        ->orderBY('integrants.empleado_id','asc')
        ->get();
        $folios = mejora::where('gpagos', '<>', '')->groupBy('gpagos')->get()->filter(function ($value) { return !empty($value); });

        return view('mejorasrapidas.procesopago', compact('mejoras', 'mrint', 'folios'));
        //dd($folios);
    }

    public function ejecutarpago()
    {
        $mpago = DB::table('mejoras')
            ->select('mejoras.id')
            ->where('mejoras.status','=','4')
            ->get();
          if ($mpago->isEmpty())
            {
                return redirect()->action([MejorasrapidasController::class, 'procesopago']);
            }
        $rcres = DB::table('mejoras')
            ->select('mejoras.rcr')
            ->whereNotNull('mejoras.rcr')
            ->orderBY('mejoras.rcr','des')
            ->first();
        $gp = DB::table('mejoras')
            ->select('mejoras.gpagos')
            ->whereNotNull('mejoras.gpagos')
            ->orderBY('mejoras.gpagos','des')
            ->first();
        if (($gp)== null) {
            $gpgo = 1;
        }
        else{
            $gpgo = $gp->gpagos;
            $gpgo++;
        }
        $current_date = date('Y-m-01');
        if (($rcres)== null) {
            $rcres = 0;
        }
        else{
            $rcres = $rcres->rcr;
        }
        foreach ($mpago as $pago) {
            $rcres++;
            $mp = mejora::where('id', '=', $pago->id)->first();
                $mp->mes_terminacion = $current_date;
                $mp->rcr = $rcres;
                $mp->status = "3";
                $mp->gpagos =$gpgo;
                $mp->save();
        }
        return redirect()->route('mejoras.mrpago', [$gpgo]);
        //dd($mp);
    }

    public function mr($gpgo)
    {
        $mrpago = DB::table('mejoras')
        ->select('mejoras.id','mejoras.status','mejoras.departamento','mejoras.solucion','mejoras.inicio','mejoras.final','mejoras.beneficiomr','mejoras.beneficio','mejoras.pers1','mejoras.pers2','mejoras.perco','mejoras.ppp','mejoras.rcr','mejoras.mes_terminacion','integrants.empleado_id','integrants.rol','integrants.pago','empleados.nombre','empleados.cia')
        ->join('integrants','mejoras.id','=','integrants.mejora_id')
        ->join('empleados','integrants.empleado_id','=','empleados.id')
        ->where('mejoras.gpagos','=', $gpgo)
        ->where('integrants.empleado_id','>','0')
        ->orderBY('mejoras.rcr','asc')
        ->groupBy('mejoras.id')
        ->get();
        $mrint = DB::table('mejoras')
        ->select('mejoras.id','mejoras.pers1','mejoras.pers2','mejoras.perco','mejoras.ppp','mejoras.gpagos','mejoras.rcr','mejoras.mes_terminacion','integrants.empleado_id','empleados.nombre','empleados.cia','empleados.nivel')
        ->join('integrants','mejoras.id','=','integrants.mejora_id')
        ->join('empleados','integrants.empleado_id','=','empleados.id')
        ->where('mejoras.gpagos','=', $gpgo)
        ->where('integrants.empleado_id','>','0')
        ->orderBY('mejoras.rcr','asc')
        ->get();
        foreach ($mrint as $intep) {
            $intep;
        }
        return view('mejorasrapidas.pagos', compact('mrpago','mrint'));
        //dd($mrint);
    }

    public function mreport(Request $request)
    {
        $gpgo = $request->folio;
        $mrpago = DB::table('mejoras')
        ->select('mejoras.id','mejoras.status','mejoras.departamento','mejoras.solucion','mejoras.inicio','mejoras.final','mejoras.beneficiomr','mejoras.beneficio','mejoras.pers1','mejoras.pers2','mejoras.perco','mejoras.ppp','mejoras.rcr','mejoras.mes_terminacion','integrants.empleado_id','integrants.rol','integrants.pago','empleados.nombre','empleados.cia')
        ->join('integrants','mejoras.id','=','integrants.mejora_id')
        ->join('empleados','integrants.empleado_id','=','empleados.id')
        ->where('mejoras.mes_terminacion','=', $gpgo)
        ->where('integrants.empleado_id','>','0')
        ->orderBY('mejoras.rcr','asc')
        ->groupBy('mejoras.id')
        ->get();
        $mrint = DB::table('mejoras')
        ->select('mejoras.id','mejoras.pers1','mejoras.pers2','mejoras.perco','mejoras.ppp','mejoras.gpagos','mejoras.rcr','mejoras.mes_terminacion','integrants.empleado_id','empleados.nombre','empleados.cia')
        ->join('integrants','mejoras.id','=','integrants.mejora_id')
        ->join('empleados','integrants.empleado_id','=','empleados.id')
        ->where('mejoras.mes_terminacion','=', $gpgo)
        ->where('integrants.empleado_id','>','0')
        ->orderBY('mejoras.rcr','asc')
        ->get();
        return view('mejorasrapidas.pagos', compact('mrpago','mrint'));
        //dd($mrpago);
    }

    public function store(Request $request)
    {
        //$mr = mejora::create($request->all());
        //return redirect()->back()
        //->with('info', 'Mejora Rapida guardado con exito');
        dd($request->all());
    }

    public function create()
    {
        return view('mejorasrapidas.create');
    }

    public function accept(Request $request)
    {
        if (($request->aprobada) == 0)
        {
            if (($request->identificador) == 4)
                {
                $mejora = new mejora();
                $mejora->p1 = $request->p1;
                $mejora->p2 = $request->p2;
                $mejora->p3 = $request->p3;
                $mejora->p4 = $request->p4;
                $mejora->p5 = $request->p5;
                $mejora->p6 = $request->p6;
                $mejora->p7 = $request->p7;
                $mejora->p8 = $request->p8;
                $mejora->p9 = $request->p9;
                $mejora->p10 = $request->p10;
                $mejora->p11 = $request->p11;
                $mejora->p12 = $request->p12;
                $mejora->p13 = $request->p13;
                $mejora->registro = $request->input('registro');
                $mejora->direccion = $request->input('direccion');
                $mejora->subdireccion = $request->input('subdireccion');
                $mejora->departamento = $request->input('depto');
                $mejora->valor = $request->input('valorprp');
                $mejora->desperdicio = $request->input('desperdicio');
                $mejora->inicio = $request->input('inicio');
                $mejora->final = $request->input('final');
                $mejora->asesor = $request->input('asesor');
                $mejora->id_autoriza = $request->input('id_jefe');
                $mejora->amejorar = $request->input('mejorar');
                $mejora->objetivo = $request->input('objetivo');
                $mejora->solucion = $request->input('solucion');
                $mejora->save();


                    if (empty($request->integ))
                    {
                    }
                    else{
                    $ro=0;
                    foreach ($request->integ as $inte) 
                    {
                    
                    $integr[] = 0;
                    if (in_array($inte, $integr)){
                        if (($inte) == 0){  
                            $propid = mejora::all();
                            $x = ($propid->last());
                            $integrante = new integrant();
                            $integrante->mejora_id = $x->id;
                            $integrante->empleado_id = $inte;
                            $integrante->rol = 3;
                            $integrante->pago = 0;
                            $integrante->save();
                        }
                    }
                    else{
                        if (($inte) > 0){
                            $integr[] = $inte;
                                $propid = mejora::all();
                                $x = ($propid->last());
                                $integrante = new integrant();
                                $integrante->mejora_id = $x->id;
                                $integrante->empleado_id = $inte;
                                if(($ro) == 0){
                                    $integrante->rol = 1;
                                }
                                if(($ro) > 0){
                                    $integrante->rol = 2;   
                                }
                                $integrante->save();

                            }
                        }
                        $ro++;   
                    }
                    }
                    $propuesta = propuesta::where('id', '=', $request->id)->first();
                    $propuesta->identificador = 5;
                    $propuesta->save();
                    return redirect()->action([MejorasrapidasController::class, 'print'], [$mejora]);
                    //return view('mejorasrapidas.print', compact('mejora'));
                }
            

            if (($request->identificador) == 3)
                {
                $proyect = new Proyect();
                $proyect->proyecto = $request->input('proyecto');
                $proyect->fecha_reg = $request->input('registro');
                $proyect->direccion = $request->input('direccion');
                $proyect->subdireccion = $request->input('subdireccion');
                $proyect->depto = $request->input('depto');
                $proyect->asesor = $request->input('asesor');
                $proyect->fecha_ini = $request->input('inicio');
                $proyect->fecha_fin = $request->input('final');
                $proyect->valor = $request->input('valorprp');
                $proyect->ahorro_anual_proy = $request->input('currency-field');
                $proyect->creativo = $request->input('creativo');
                $proyect->areas_part = $request->input('areas');
                $proyect->skills_integ = $request->input('skills');
                $proyect->principales_act = $request->input('principales');
                $proyect->conocimiento_critico = $request->input('critico');
                $proyect->sindicalizados = $request->input('sindicalizados');
                $proyect->save();
                //dd($proyect);


                    $propid = Proyect::all();
                    $x = ($propid->last());
                    if (empty($request->integ))
                    {
                    }
                    else{
                    foreach ($request->integ as $inte) 
                    {
                    
                    $integr[] = 0;
                    if (in_array($inte, $integr)){
                        if (($inte) == 0){  
                        }
                    }
                    else{
                        if (($inte) > 0){
                            $integr[] = $inte;
                                $integrante = new integrant();
                                $integrante->proyect_id = $x->id;
                                $integrante->empleado_id = $inte;
                                $integrante->rol = 3;
                                $integrante->save();

                            }
                        }
                    }
                }

                    $propuesta = propuesta::where('id', '=', $request->id)->first();
                    $propuesta->identificador = 7;
                    $propuesta->save();

                    return redirect()->route('proyects.show',[$x->id]);
                }
            
        }
        if (($request->aprobada) == 1)
        {
            if (($request->identificador) == 3)
            {
                $propuesta = propuesta::where('id', '=', $request->id)->first();
                $propuesta->identificador = 8;
                $propuesta->comentarios = $request->input('observaciones');
                $propuesta->save();
            }
            if (($request->identificador) == 4)
            {
                $propuesta = propuesta::where('id', '=', $request->id)->first();
                $propuesta->identificador = 6;
                $propuesta->comentarios = $request->input('observaciones');
                $propuesta->save();
            }

            return redirect()->route('propuesta3.index');
        }

        //dd($request->all());
    }

    public function print(mejora $mejora)
    {
        return view('mejorasrapidas.print', compact('mejora'));
        //dd($request);
    }
    public function printreco(mejora $mejora)
    {
        return view('mejorasrapidas.printreco', compact('mejora'));
        //dd($request);
    }   
    public function edit(mejora $mejora)
    {
        if(($mejora->status) == 3)
        {
            return redirect()->route('mr.index');
        }
        else{
            return view('mejorasrapidas.edit3', compact('mejora'));
        }
        //dd($mejora);
    }   

    public function validar(mejora $mejora)
    {
        $validar = mejora::where('id', '=', $mejora->id)->first();
        $validar->status = "4";
        //dd($validar);
        $validar->save();
        return redirect()->route('mr.finished');
    }  

    public function aterm(mejora $mejora)
    {
        $aterm = mejora::where('id', '=', $mejora->id)->first();
        $aterm->status = "2";
        //dd($aterm);
        $aterm->save();
        return redirect()->route('mrprocesos.create');
    } 

    public function update(Request $request)
    {
        if (($request->check) == 0) {
            $mejoraupdate = mejora::where('id', '=', $request->id)->first();
            $mejoraupdate->status = $request->status;
            $mejoraupdate->save();
        }
        else{
            $mejoraupdate = mejora::where('id', '=', $request->id)->first();
            $mejoraupdate->id_autoriza = $request->id_jefe;
            if (($request->status) < 2)
            {
                $mejoraupdate->status = $request->status;
            }
            $mejoraupdate->valor = $request->valor;
            $mejoraupdate->desperdicio = $request->desperdicio;
            $mejoraupdate->inicior = $request->ireal;
            $mejoraupdate->finr = $request->freal;
            $mejoraupdate->amejorar = $request->mejorar;
            $mejoraupdate->objetivo = $request->objetivo;
            $mejoraupdate->solucion = $request->solucion;
            $mejoraupdate->save();

            $folio = $request->id;
            $original = $request->intego;
            $nueva = $request->integ;
            $ids = $request->integh;
            $i=0;
            foreach ($request->intego as $new) {
                if (($ids[$i]) == 0) {
                    if (($nueva[$i]) > 0) {
                        if (($i) == 0) {
                            $integrante = new integrant();
                            $integrante->empleado_id = $nueva[$i];
                            $integrante->mejora_id = $folio;
                            $integrante->rol = 1;
                            $integrante->pago = 1;
                            $integrante->save();
                        }
                        else{
                            $integrante = new integrant();
                            $integrante->empleado_id = $nueva[$i];
                            $integrante->mejora_id = $folio;
                            $integrante->rol = 2;
                            $integrante->pago = 1;
                            $integrante->save();  
                        }
                    }    
                    else{
                        $integrante = new integrant();
                        $integrante->empleado_id = 0;
                        $integrante->mejora_id = $folio;
                        $integrante->rol = 3;
                        $integrante->pago = 0;
                        $integrante->save();
                    }    
                }
                else{
                    if (($nueva[$i]) > 0) {
                        if (($nueva[$i]) <> ($original)) {
                            if (($original) > 0) {
                                if (($i) == 0) {
                                    $integrante = integrant::where('id', '=', $ids[$i])->first();
                                    $integrante->empleado_id = $nueva[$i];
                                    $integrante->rol = 1;
                                    $integrante->pago = 1;
                                    $integrante->save();
                                }
                                else{
                                    $integrante = integrant::where('id', '=', $ids[$i])->first();
                                    $integrante->empleado_id = $nueva[$i];
                                    $integrante->rol = 2;
                                    $integrante->pago = 1;
                                    $integrante->save();  
                                }
                            }
                            else{
                                if (($i) == 0) {
                                    $integrante = integrant::where('id', '=', $ids[$i])->first();
                                    $integrante->empleado_id = $nueva[$i];
                                    $integrante->rol = 1;
                                    $integrante->pago = 1;
                                    $integrante->save();
                                }
                                else{
                                    $integrante = integrant::where('id', '=', $ids[$i])->first();
                                    $integrante->empleado_id = $nueva[$i];
                                    $integrante->rol = 2;
                                    $integrante->pago = 1;
                                    $integrante->save();  
                                }
                            }    
                        }
                    }
                    else{
                        $integrante = integrant::where('id', '=', $ids[$i])->first();
                        $integrante->empleado_id = $nueva[$i];
                        $integrante->rol = 3;
                        $integrante->pago = 0;
                        $integrante->save();    
                    }
                }
            $i++;
            }
        }
        //dd($request->all());
        $id = $request->id;
        if (($request->status) == 2){
            return redirect()->action([MejorasrapidasController::class, 'evaluar'], [$id]);
        }
        else{
            return redirect()->back();
        }
    }  

    public function evaluar($id)
    {
        $mejora = mejora::where('id', '=', $id)->first();
        return view('mejorasrapidas.evaluar', compact('mejora'));
        //dd($mejora);
    }

    public function eval(Request $request)
    {
        $eval = mejora::where('id', '=', $request->mrid)->first();
            $eval->pers1 = $request->pers1;
            $eval->pers2 = $request->pers2;
            $eval->perco = $request->perc;
            $eval->status = "2";
            $eval->beneficiomr = $request->beneficiomr;
            $eval->fecha_terminacion = $request->fecha;
            if (($request->beneficiomr) == 0){
                $eval->evala = $request->evala;
                $eval->evalo = $request->evalo;
                $eval->evale = $request->evale;
                $ppp = ((((($request->evala + $request->evalo + $request->evale)/3)/100)*5000)/($request->pers1 + $request->pers2 + $request->perc));
                $eval->ppp = round($ppp,0);
            }
            else{
                $eval->beneficio = $request->beneficio_eco;
                $ppp = (($request->beneficio_eco*.05)/($request->pers1 + $request->pers2 + $request->perc))+700;
                $eval->ppp = round($ppp,0);
            }
            $eval->save();
            return redirect()->route('mr.finished');
        //dd($eval);
    }        
}