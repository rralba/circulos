<?php

namespace App\Http\Controllers;

use App\Proyect;
use App\integrant;
use App\empleado;
use App\beneficio;
use App\reconocimiento;
use App\descuento;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use DB;

class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyects = DB::table('proyects')
        ->where('proy_status', '=', '1')
        ->get();
        return view('proyects.index', ['proyects' => $proyects]);
        // dd($proyect->all());
    }

    public function cancelados()
    {
        $proyects = DB::table('proyects')
        ->where('proy_status', '=', '0')
        ->get();
        return view('proyects.cancelados', ['proyects' => $proyects]);
        // dd($proyect->all());
    }

    public function terminado()
    {
        $proyects = DB::table('proyects')
        ->where('proy_status', '>', '1')
        ->get();
        return view('proyects.terminados', ['proyects' => $proyects]);
        // dd($proyect->all());
    }

    public function registro(Proyect $proyect)
    {
        return view('proyects.registro', compact('proyect'));
        //dd($proyect);
    }
 /**
     * Display a listing of the resource.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function master()
    {
        $proye = DB::table('proyects')->get();
        return view('proyects.master', ['proye' => $proye]);
        // dd($proye->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyect = Proyect::create($request->all());
        return redirect()->back()
        ->with('info', 'Proyecto guardado con exito');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function show(Proyect $proyect)
    {   
       return view('proyects.show', compact('proyect'));
    }

    public function rcr(Proyect $proyect)
    {   
       return view('proyects.rcr', compact('proyect'));
    }
    
      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyect $proyect)
    {
        if (($proyect->comite) == 0){
            
            return view('proyects.edit', compact('proyect'));
        }
        else{
            return redirect()->action([ProyectController::class, 'index']);
        }    
    }

    public function editm(Proyect $proyect)
    {
        return view('proyects.edit', compact('proyect'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $current_date = date('Y-m-d');
        $proyectos = Proyect::where('id', '=', $request->id)->first();
        $proyectos->proyecto = $request->input('proyecto');
        $proyectos->fecha_reg = $request->input('registro');
        $proyectos->direccion = $request->input('direccion');
        $proyectos->subdireccion = $request->input('subdireccion');
        $proyectos->depto = $request->input('departamento');
        $proyectos->nivel = $request->input('nivel');
        $proyectos->comite = $request->input('comite');
        $proyectos->asesor = $request->input('asesor');
        $proyectos->valor = $request->input('valor');
        $proyectos->metodologia = $request->input('metodologia');
        if(($request->input('beneficio_eco'))> 0){
            $proyectos->ahorro_anual_proy = $request->input('beneficio_eco');
        }
        $proyectos->metrico_primario = $request->input('metricopim');
        $proyectos->metrico_secundario = $request->input('metricosec');
        $proyectos->empresa = $request->input('empresa');
        $proyectos->desc_proy = $request->input('descuento');
        $proyectos->proy_status = $request->input('estatus');
        if(($request->input('estatus')) == 3){
            $proyectos->fecha_finreal = $current_date;
        }
        $proyectos->creativo = $request->input('creativo');
        $proyectos->areas_part = $request->input('areas');
        $proyectos->skills_integ = $request->input('skills');
        $proyectos->principales_act = $request->input('principales');
        $proyectos->conocimiento_critico = $request->input('critico');
        $proyectos->sindicalizados = $request->input('sindicalizados');
        $proyectos->save();
        return redirect()->back()->with('info', 'Proyecto Actualizado');
        //dd($request->all());
    }
    public function save(Request $request, Proyect $proyect, integrant $integrant)
    {

        // $integrant->update($request->all());
        // return redirect()->back()->with('info', 'Integrante actualizado con exito');
        // $integrante = integrant::where('id', '=', $request->pin)->first();
        // $integrante->id = $request->input('pin');
        // $integrante->proyect_id = $request->input('proy_id');
        // $integrante->empleado_id = $request->input('edit_id');
        // $integrante->rol = $request->input('country');
        // $integrante->save();
        // return redirect()->back();
        $autor = DB::table('integrants')
            ->where('proyect_id','=',$request->proy_id)
            ->where('rol','=', 1)
            ->count();
        $imp_a = DB::table('integrants')
            ->where('proyect_id','=',$request->proy_id)
            ->where('rol','=', '2')
            ->count();     
        if (($request->country) == 1){
            if (($autor) > 0){
                return redirect()->back()->with('info', 'Proyeto ya cuenta con autor');
            }
            else {
                $integrante = integrant::where('id', '=', $request->pin)->first();
                $integrante->rol = $request->input('country');
                $integrante->save();
            return redirect()->back();
            }
            }
        else{
            if (($request->country) == 2){
                if (($imp_a) >= 2){
                    return redirect()->back()->with('info', 'Numero maximo de Implementadores A alcanzado');
                }
                else {
                    $integrante = integrant::where('id', '=', $request->pin)->first();
                    $integrante->rol = $request->input('country');
                    $integrante->save();
                    return redirect()->back();
                }
            }
            else{
                if (($request->country) == 3){
                    $integrante = integrant::where('id', '=', $request->pin)->first();
                    $integrante->rol = $request->input('country');
                    $integrante->save();
                    return redirect()->back();  
                }
            }
        }
        // dd($request->all());
    }

    public function benedit(Request $request)
    {
        $beneficio = beneficio::where('id', '=', $request->idbenef)->first();
        $beneficio->status = $request->input('statusbenef');
        $beneficio->save();
        return redirect()->back()->with('info', 'Status Actualizado');
        // dd($request->all());
    }

    public function benupdate(Request $request, beneficio $beneficio)
    {
        $beneficio = beneficio::where('id', '=', $request->id)->first();
        $beneficio->fecha_gen = $request->input('fechagen');
        $beneficio->beneficio = $request->input('benef');
        $beneficio->save();
        return redirect()->back()->with('info', 'Beneficio Actualizado');
        // dd($request->all());
    }

    public function addbenef(Request $request)
    {
        $beneficio = new beneficio();
        $beneficio->proyect_id = $request->input('proyect_id');
        $beneficio->fecha_gen = $request->input('fecha_gen');
        $beneficio->beneficio = $request->input('beneficio');
        $beneficio->save();
        return redirect()->back();
        // dd($beneficio->all());
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $delete = integrant::where('id' ,$data['pinn'])->delete();
        return redirect()->back();
        // dd($request->all());
    }

    public function add(Request $request)
    {
        $int_total = integrant::where('proyect_id','=',$request->proyect_id)
            ->count();
        $autor = DB::table('integrants')
            ->where('proyect_id','=',$request->proyect_id)
            ->where('rol','=', 1)
            ->count();
        $imp_a = DB::table('integrants')
            ->where('proyect_id','=',$request->proyect_id)
            ->where('rol','=', '2')
            ->count();
        $idsap = DB::table('integrants')
            ->where('proyect_id','=',$request->proyect_id)
            ->where('empleado_id','=',$request->add_id)
            ->count();    
        $existe = DB::table('empleados')
            ->where('id','=',$request->add_id)
            ->count();
        if (($existe) == 0){
            return redirect()->back()->with('info', 'No existe empleado');
            }
            else{
        if (($idsap) == 1){
            return redirect()->back()->with('info', 'Integrante duplicado');
            }   
            else{ 
        if (($int_total) >= 10) {
            return redirect()->back()->with('info', 'Numero maximo de integrantes alcanzado');
        } 
        if (($request->rol) == 1){
            if (($autor) > 0){
                return redirect()->back()->with('info', 'Proyeto ya cuenta con autor');
            }
            else {
                $integrante = new integrant();
                $integrante->proyect_id = $request->input('proyect_id');
                $integrante->empleado_id = $request->input('add_id');
                $integrante->rol = $request->input('rol');
                $integrante->save();
            return redirect()->back();
            }
            }
            else{
            if (($request->rol) == 2){
                if (($imp_a) >= 2){
                    return redirect()->back()->with('info', 'Numero maximo de Implementadores A alcanzado');
                }
                else {
                $integrante = new integrant();
                $integrante->proyect_id = $request->input('proyect_id');
                $integrante->empleado_id = $request->input('add_id');
                $integrante->rol = $request->input('rol');
                $integrante->save();
                return redirect()->back();
                }
        }
            else{
                if (($request->rol) == 3){
                    $integrante = new integrant();
                    $integrante->proyect_id = $request->input('proyect_id');
                    $integrante->empleado_id = $request->input('add_id');
                    $integrante->rol = $request->input('rol');
                    $integrante->save();
                    return redirect()->back();  
                }
            }
        }
    }
    }
        // dd($request->all());
}    
        
    public function recoindex(Proyect $proyect, Request $request)
    {
        $data = db::table('proyects')
        ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
        ->join('reconocimientos', 'beneficios.id', '=', 'reconocimientos.beneficio_id')
        ->join('empleados', 'reconocimientos.empleado', '=', 'empleados.id')
        ->select('reconocimientos.id','reconocimientos.beneficio_id','reconocimientos.empleado','reconocimientos.previo','reconocimientos.pago','reconocimientos.ajuste', 'empleados.nombre','beneficios.fecha_gen')
        ->where('proyects.id', '=', $proyect->id)
        ->get();
        //dd($data);
        return view('proyects.reconocimientos', compact('data', 'proyect', 'request'));
    }

    public function recupdate(Request $request)
    {
        $valor = $request->reco;
        $valor2 = str_replace(array("$",","),"",$valor);
        $reconocimient = reconocimiento::where('id', '=', $request->proyect_id)->first();
        $reconocimient->ajuste = $valor2;
        $reconocimient->save();
        return redirect()->back()->with('info', 'Reconocimiento Actualizado');
        //dd($reconocimient);
    }


    public function beneindex(Request $request, Proyect $proyect, beneficio $beneficio)
    {
        $data = db::table('proyects')
        ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
        ->join('integrants', 'beneficios.proyect_id', '=', 'integrants.proyect_id')
        ->select('beneficios.*', 'integrants.empleado_id', 'integrants.rol', 'integrants.pago')
        ->where('beneficios.proyect_id', '=',$proyect->id)
        ->where('beneficios.status', '<>', '2')
        ->groupBy('id')
        ->get();
        return view('proyects.beneficios', compact('data', 'proyect', 'beneficio', 'request'));
        // dd($data->all());  
    }   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function benefdestroy(Request $request)
    {
        $data = $request->all();
        $delete = beneficio::where('id' ,$data['pinn'])->delete();
        return redirect()->back();
        // dd($request->all());
    }

    public function procesosindex(Proyect $proyect, beneficio $beneficio)
    {
        $data = db::table('proyects')
        ->where('proyects.proy_status', '=','3')
        ->get();
        $folios = beneficio::where('foliopago', '<>', '')->groupBy('foliopago')->get()->filter(function ($value) { return !empty($value); });
        return view('proyects.procesos', compact('data','folios'));
        //dd($folios);  
    }

    public function procesosindexbenef(Proyect $proyect, beneficio $beneficio, Request $request)
    {
        $pychk = db::table('proyects')
        ->select('id')
        ->where('proyects.proy_status', '=','3')
        ->get();
        foreach ($pychk as $dat)
        {
        $pagoschk = db::table('beneficios')
                    ->where('proyect_id', '=', $dat->id)
                    ->where('status','=', '1')
                    ->count();
                    if (($pagoschk)> 36) {
                        $proychk = Proyect::where('id', '=', $dat->id)->first();
                        $proychk->proy_status = '2';
                        $proychk->save();
                    }
        }
        $data = db::table('proyects')
        ->where('proyects.proy_status', '=','3')
        ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
        ->select('beneficios.*', 'proyects.proyecto')
        ->where('beneficios.fecha_gen', '=', $request->mes)
        ->where('beneficios.status', '=', '0')
        ->get();
        return view('proyects.procesosbenef', compact('data', 'proyect', 'beneficio'));
        //dd($pagoschk);  
    }

    public function procesosdest(Request $request)
    {
        $proyectstatus = Proyect::where('id', '=', $request->pinn)->first();
        $proyectstatus->proy_status = $request->input('proyestat');
        $proyectstatus->save();
        return redirect()->back()->with('info', 'Status Actualizado');
        // dd($request->all());  
    }

    public function procesospago(Request $request)
    {
        $mes1 = $request->fechabenef;
        $folio = $request->folio;
        $nproy = db::table('proyects')
            ->select('beneficios.proyect_id','proyects.proyecto','proyects.nivel','proyects.desc_proy','beneficios.id','beneficios.beneficio','beneficios.status','integrants.empleado_id','integrants.rol','integrants.pago','empleados.nombre','empleados.posicion',
            'empleados.depto','empleados.nivel as relab','beneficios.fecha_gen','beneficios.num_pago','integrants.pago','empleados.cia','descuentos.descuento','descuentos.beneficio_id','descuentos.sap_id')
            ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            ->join('integrants', 'beneficios.proyect_id', '=', 'integrants.proyect_id')
            ->join('empleados', 'integrants.empleado_id', '=', 'empleados.id')
            ->leftjoin('descuentos', function ($join){
                $join->on('beneficios.id', '=', 'descuentos.beneficio_id')->on('descuentos.sap_id','=','integrants.empleado_id');
                })
            ->where('proyects.proy_status', '=', '3')
            ->where('beneficios.fecha_gen', '=', $mes1)
            ->where('beneficios.status', '=', '0')
            ->where('empleados.nivel', '=', '1')
            ->get();
            if ($nproy->isEmpty())
            {
                return redirect()->route('procesos.index')->with('info', 'No Existen Beneficios por Calcular');
            }
            foreach ($nproy as $beneficios)
                {
                    if (($beneficios->nivel)== 1)
                    {
                       $x = $beneficios;
                       $btotal = $x->beneficio*0.1;   
                    if (($beneficios->rol)==1)
                       {
                           $beneficio = $btotal*.3;
                           $beneficio = round($beneficio,0);
                           $proyecto = $x->proyecto;
                           $proyect_id = $x->proyect_id;
                           $nivel = $x->nivel;
                           $desc_proy = $x->desc_proy;
                           $id = $x->id;
                           $status = $x->status;
                           $empleado_id = $x->empleado_id;
                           $rol = $x->rol;
                           $pago = $x->pago;
                           $nombre = $x->nombre;
                           $posicion = $x->posicion;
                           $depto = $x->depto;
                           $fecha_gen = $x->fecha_gen;
                           $relab = $x->relab;
                           $cia = $x->cia;
                           $descuento = $x->descuento;
                       }
                       if (($beneficios->rol)==2)
                       {
                        $beneficio = $btotal*.14;
                        $beneficio = round($beneficio,0);
                        $proyecto = $x->proyecto;
                        $proyect_id = $x->proyect_id;
                        $nivel = $x->nivel;
                        $desc_proy = $x->desc_proy;
                        $id = $x->id;
                        $status = $x->status;
                        $empleado_id = $x->empleado_id;
                        $rol = $x->rol;
                        $pago = $x->pago;
                        $nombre = $x->nombre;
                        $posicion = $x->posicion;
                        $depto = $x->depto;
                        $fecha_gen = $x->fecha_gen;
                        $relab = $x->relab;
                        $cia = $x->cia;
                        $descuento = $x->descuento;
                       }
                       if (($beneficios->rol)==3)
                       {
                        $beneficio = $btotal*.06;
                        $beneficio = round($beneficio,0);
                        $proyecto = $x->proyecto;
                        $proyect_id = $x->proyect_id;
                        $nivel = $x->nivel;
                        $desc_proy = $x->desc_proy;
                        $id = $x->id;
                        $status = $x->status;
                        $empleado_id = $x->empleado_id;
                        $rol = $x->rol;
                        $pago = $x->pago;
                        $nombre = $x->nombre;
                        $posicion = $x->posicion;
                        $depto = $x->depto;
                        $fecha_gen = $x->fecha_gen;
                        $relab = $x->relab;
                        $cia = $x->cia;
                        $descuento = $x->descuento;
                       }
                       if (($beneficios->pago)==0)
                       {
                           $beneficio = 0;
                           $beneficio = round($beneficio,0);
                           $proyecto = $x->proyecto;
                           $proyect_id = $x->proyect_id;
                           $nivel = $x->nivel;
                           $desc_proy = $x->desc_proy;
                           $id = $x->id;
                           $status = $x->status;
                           $empleado_id = $x->empleado_id;
                           $rol = $x->rol;
                           $pago = $x->pago;
                           $nombre = $x->nombre;
                           $posicion = $x->posicion;
                           $depto = $x->depto;
                           $fecha_gen = $x->fecha_gen;
                           $relab = $x->relab;
                           $cia = $x->cia;
                           $descuento = $x->descuento;
                       }
                       if (($beneficios->id)==($beneficios->beneficio_id))
                       {
                           if (($beneficios->empleado_id)==($beneficios->sap_id))
                           {
                               $beneficio = $beneficio - $beneficios->descuento;
                           }
                       }
                       if (($beneficio) < 0)
                        {
                            $beneficio = 0;
                        }
                    }
                    else
                    {
                        $x = $beneficios;
                       $btotal = $x->beneficio*0.05;      
                    if (($beneficios->rol)==1)
                       {
                           $beneficio = $btotal*.15;
                           $beneficio = round($beneficio,0);
                           $proyecto = $x->proyecto;
                           $proyect_id = $x->proyect_id;
                           $nivel = $x->nivel;
                           $desc_proy = $x->desc_proy;
                           $id = $x->id;
                           $status = $x->status;
                           $empleado_id = $x->empleado_id;
                           $rol = $x->rol;
                           $pago = $x->pago;
                           $nombre = $x->nombre;
                           $posicion = $x->posicion;
                           $depto = $x->depto;
                           $fecha_gen = $x->fecha_gen;
                           $relab = $x->relab;
                           $cia = $x->cia;
                           $descuento = $x->descuento;
                       }
                       if (($beneficios->rol)==2)
                       {
                        $beneficio = $btotal*.07;
                        $beneficio = round($beneficio,0);
                        $proyecto = $x->proyecto;
                        $proyect_id = $x->proyect_id;
                        $nivel = $x->nivel;
                        $desc_proy = $x->desc_proy;
                        $id = $x->id;
                        $status = $x->status;
                        $empleado_id = $x->empleado_id;
                        $rol = $x->rol;
                        $pago = $x->pago;
                        $nombre = $x->nombre;
                        $posicion = $x->posicion;
                        $depto = $x->depto;
                        $fecha_gen = $x->fecha_gen;
                        $relab = $x->relab;
                        $cia = $x->cia;
                        $descuento = $x->descuento;
                       }
                       if (($beneficios->rol)==3)
                       {
                        $beneficio = $btotal*.03;
                        $beneficio = round($beneficio,0);
                        $proyecto = $x->proyecto;
                        $proyect_id = $x->proyect_id;
                        $nivel = $x->nivel;
                        $desc_proy = $x->desc_proy;
                        $id = $x->id;
                        $status = $x->status;
                        $empleado_id = $x->empleado_id;
                        $rol = $x->rol;
                        $pago = $x->pago;
                        $nombre = $x->nombre;
                        $posicion = $x->posicion;
                        $depto = $x->depto;
                        $fecha_gen = $x->fecha_gen;
                        $relab = $x->relab;
                        $cia = $x->cia;
                        $descuento = $x->descuento;
                       }
                       if (($beneficios->pago)==0)
                       {
                           $beneficio = 0;
                           $beneficio = round($beneficio,0);
                           $proyecto = $x->proyecto;
                           $proyect_id = $x->proyect_id;
                           $nivel = $x->nivel;
                           $desc_proy = $x->desc_proy;
                           $id = $x->id;
                           $status = $x->status;
                           $empleado_id = $x->empleado_id;
                           $rol = $x->rol;
                           $pago = $x->pago;
                           $nombre = $x->nombre;
                           $posicion = $x->posicion;
                           $depto = $x->depto;
                           $fecha_gen = $x->fecha_gen;
                           $relab = $x->relab;
                           $cia = $x->cia;
                           $descuento = $x->descuento;
                       }
                       if (($beneficios->id)==($beneficios->beneficio_id))
                       {
                           if (($beneficios->empleado_id)==($beneficios->sap_id))
                           {
                               $beneficio = $beneficio - $beneficios->descuento;
                           }
                       } 
                       if (($beneficio) < 0)
                        {
                            $beneficio = 0;
                        } 
                    } 
                    $npago = db::table('beneficios')
                        ->where('proyect_id', '=', $x->proyect_id)
                        ->where('status','=', '1')
                        ->count();
                        $npago = $npago + 1;
                    $num_pago = $npago;
                    $datafin[] = array("beneficio"=>$beneficio,"proyecto"=>$proyecto,"proyect_id"=>$proyect_id,"nivel"=>$nivel,"desc_proy"=>$desc_proy,"id"=>$id,"status"=>$status,"empleado_id"=>$empleado_id,"rol"=>$rol,"pago"=>$pago,"nombre"=>$nombre,"posicion"=>$posicion,"depto"=>$depto,"fecha_gen"=>$fecha_gen,"num_pago"=>$num_pago,"relab"=>$relab,"cia"=>$cia,"descuento"=>$descuento); 
                    $datafin = array_sort($datafin, 'empleado_id', SORT_DESC);
                    $datafin = array_sort($datafin, 'beneficio', SORT_DESC);   
                }
                $nuwbar = $datafin;
                foreach ($nuwbar as $key => $row) {
                    $count1[$key] = $row['empleado_id'];
                    $count2[$key] = $row['beneficio'];
                }
                array_multisort($count1, SORT_ASC, SORT_NUMERIC, $count2, SORT_DESC, SORT_NUMERIC, $nuwbar);
                 $json = json_encode($nuwbar);
         return view('proyects.pagos', compact('json','mes1', 'folio'));
        //dd($json);  
    }

    public function desceuntoscrear(Request $request, Proyect $proyect, beneficio $beneficio)
    {
        $benef = $request->input('benefi'); 
        $fgen = $request->input('fechagenn');
        $desctot = DB::table('descuentos')
            ->where('beneficio_id','=',$benef)
            ->count();
        if (($desctot) > 0){
        $dat = db::table('descuentos')
            ->select('descuentos.*','empleados.nombre')
            ->join('empleados', 'descuentos.sap_id', '=','empleados.id')
            ->where('descuentos.beneficio_id', '=',$benef)
            ->groupBy('nombre')
            ->get();
            return view('proyects.descuentos', compact('dat', 'proyect', 'request', 'beneficio', 'benef', 'desctot', 'fgen'));
        }
        else{
        $dat = db::table('proyects')
            ->select('beneficios.*', 'integrants.empleado_id', 'integrants.rol', 'integrants.pago', 'empleados.nombre', 'empleados.posicion')
            ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            ->join('integrants', 'beneficios.proyect_id', '=', 'integrants.proyect_id')
            ->join('empleados', 'integrants.empleado_id', '=', 'empleados.id')
            ->where('beneficios.proyect_id', '=',$proyect->id)
            ->where('beneficios.id', '=',$benef)    
            ->groupBy('empleado_id')
            ->orderBy('rol', 'asc')
            ->get();
            return view('proyects.descuentos', compact('dat', 'proyect', 'request', 'beneficio', 'benef', 'desctot', 'fgen'));
        }
        //dd($desctot, $dat, $fgen);  
    } 

    public function descuentostore(Request $request, Proyect $proyect)
    {
        if (($request->desctot) == 0){
        $benef = $request->benefif;
        $empl = $request->sapid;
        $prev = $request->descu;
        $rea = $request->concep;
        $i=0;
        foreach ($request->benefif as $request) {
            descuento::create([
                'beneficio_id' => $benef[$i],
                'sap_id' => $empl[$i],
                'descuento' =>$prev[$i],
                'concepto' => $rea[$i]
            ]);
            $i++;
        }
        return redirect()->route('beneficios.index', [$proyect->id])->with('info', 'Descuentos guardado con exito');
        }
        else{
        $r = 0;
        foreach($request->benefif as $requestt)
        {    
            $descuento = descuento::where('id', '=', $requestt)->first();
            $descuento->descuento = $request->descu[$r];
            $descuento->concepto = $request->concep[$r];
            $descuento->save();
            $r++;
        } 
        return redirect()->route('beneficios.index', [$proyect->id])->with('info', 'Descuentos Actualizado con exito');         
        }
        //dd($request->all());
    }

    public function procesosave(Request $request)
    {
        $nump = $request->num_pago;
        $r = 0;
        foreach($request->id as $requestt)
        {    
            $beneficio = beneficio::where('id', '=', $requestt)->first();
            $beneficio->foliopago = $request->folio;
            $beneficio->status = '1';
            $beneficio->num_pago = $nump[$r];
            $beneficio->mes_pago = $request->mes_pago;
            $beneficio->save();
            if(($nump[$r])== 36)
            {
                $proyec = Proyect::where('id', '=', $request->proyect_id[$r])->first();
                $proyec->proy_status = '2';
                $proyec->save();
            }
            $r++;
        }    
        $fol = $request->folio;
        $benef = $request->id;
        $empl = $request->empleado;
        $prev = $request->pago;
        $rea = $request->real;
        $i=0;
        foreach ($request->id as $requesttt) {
            reconocimiento::create([
                'beneficio_id' => $benef[$i],
                'empleado' => $empl[$i],
                'previo' =>$prev[$i],
                'pago' => $rea[$i]
            ]);
            $i++;
        }
          return redirect()->action([ProyectController::class, 'printpago'], [$fol]);  
        //dd($fol, $benef, $empl, $prev, $rea);
    }

    public function printpago($fol)
    {
        $jsonp = db::table('proyects')
            ->join('integrants', 'proyects.id', '=', 'integrants.proyect_id')
            ->join('empleados', 'integrants.empleado_id', '=', 'empleados.id')
            ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            ->leftjoin('reconocimientos', function ($join){
                $join->on('beneficios.id', '=', 'reconocimientos.beneficio_id')->on('reconocimientos.empleado','=','integrants.empleado_id');
                })
            ->select('reconocimientos.empleado','reconocimientos.previo','reconocimientos.pago','reconocimientos.id','beneficios.num_pago','beneficios.foliopago','empleados.nombre','empleados.posicion','empleados.depto','empleados.cia','proyects.proyecto')
            ->where('beneficios.foliopago', '=', $fol)
            ->where('integrants.pago', '=', '1')
            ->whereNotNull('reconocimientos.empleado')
            ->orderBy('proyecto', 'asc')
            ->orderBy('pago', 'des')
            ->groupBy('id')
            ->get();
            //$jsonp = json_encode($pagof);
            //dd($jsonp);
        return view('proyects.pagosprint', compact('jsonp','fol'));
    }
    public function procesosprint(Request $request)
    {
        $fol = $request->folio;
        $jsonp = db::table('proyects')
            ->join('integrants', 'proyects.id', '=', 'integrants.proyect_id')
            ->join('empleados', 'integrants.empleado_id', '=', 'empleados.id')
            ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            ->leftjoin('reconocimientos', function ($join){
                $join->on('beneficios.id', '=', 'reconocimientos.beneficio_id')->on('reconocimientos.empleado','=','integrants.empleado_id');
                })
            ->select('reconocimientos.empleado','reconocimientos.previo','reconocimientos.pago','reconocimientos.id','reconocimientos.ajuste','beneficios.num_pago','beneficios.foliopago','empleados.nombre','empleados.posicion','empleados.depto','empleados.cia','proyects.proyecto')
            ->where('beneficios.foliopago', '=', $fol)
            ->whereNotNull('reconocimientos.empleado')
            ->where('integrants.pago', '=', '1')
            ->orderBy('proyecto', 'asc')
            ->orderBy('pago', 'des')
            ->groupBy('id')
            ->get();
        return view('proyects.procesosprint', compact('jsonp','fol'));
        //dd($request->all());
    }
}