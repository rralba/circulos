<?php

namespace App\Http\Controllers;

use App\Proyect;
use App\integrant;
use App\empleado;
use App\beneficio;
use App\reconocimiento;
use App\descuento;
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

    public function destroy(Request $request)
    {
        dd($request->all());
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
    public function create()
    {
        return view('proyects.create');
    }

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
    
    public function showmaster(Proyect $proyect, integrant $integrant)
    {   
       return view('proyects.showmaster', compact('proyect', 'integrant'));
    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyect $proyect)
    {
        return view('proyects.edit', compact('proyect'));
    }
    public function editar(Proyect $proyect, integrant $integrant)
    {
        return view('proyects.editinteg', compact('proyect', 'integrant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyect $proyect)
    {   
        $proyect->update($request->all());
        return redirect()->route('proyects.edit', $proyect->id)
        ->with('info', 'Proyecto actualizado con exito');
    }
    public function save(Request $request, Proyect $proyect, integrant $integrant)
    {
        // $integrant->update($request->all());
        // return redirect()->back()->with('info', 'Integrante actualizado con exito');
        $integrante = integrant::where('id', '=', $request->pin)->first();
        $integrante->id = $request->input('pin');
        $integrante->proyect_id = $request->input('proy_id');
        $integrante->empleado_id = $request->input('edit_id');
        $integrante->rol = $request->input('country');
        $integrante->save();
        return redirect()->back();
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
        // $beneficio = beneficio::create($request->all());
        // return view('proyects.beneficios', compact('request', 'beneficio'));
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
            ->where('empleado_id','=',$request->id)
            ->count();    
        $existe = DB::table('empleados')
            ->where('id','=',$request->id)
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
                $integrante->empleado_id = $request->input('id');
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
                $integrante->empleado_id = $request->input('id');
                $integrante->rol = $request->input('rol');
                $integrante->save();
                return redirect()->back();
                }
        }
            else{
                if (($request->rol) == 3){
                    $integrante = new integrant();
                    $integrante->proyect_id = $request->input('proyect_id');
                    $integrante->empleado_id = $request->input('id');
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
        // $reconocimientos = reconocimiento::paginate();
        // return view('proyects.reconocimientos', compact('reconocimientos', 'proyect', 'request'));
        // $prueba = $request;
        // $num = $proyect->id;
        // $data = Proyect::where('proyects.id', '=', '$num')
        $data = db::table('proyects')
        ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
        ->join('reconocimientos', 'beneficios.id', '=', 'reconocimientos.beneficio_id')
        ->select('reconocimientos.*', 'beneficios.id', 'proyects.id')
        ->get();
        return view('proyects.reconocimientos', compact('data', 'proyect', 'request'));
        // $data = DB::table('proyects')
        // ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
        // ->join('reconocimientos', 'beneficios.id', '=', 'reconocimientos.beneficio_id')
        // ->get();
        // $reco = reconocimiento::where('proyect_id', '=', $request);
        // return view('proyects.reconocimientos', compact('proyect', 'beneficio'));
        // dd($reconocimientos);
        // var_dump($data); die();
        // dd($data);
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
        ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
        ->select('beneficios.*', 'proyects.proyecto')
        ->where('beneficios.status', '=','2')
        ->get();
        return view('proyects.procesos', compact('data', 'proyect', 'beneficio'));
        // dd($data->all());  
    }

    public function procesosdest(Request $request)
    {
        $beneficio = beneficio::where('id', '=', $request->pinn)->first();
        $beneficio->status = $request->input('proyestat');
        $beneficio->save();
        return redirect()->back()->with('info', 'Status Actualizado');
        // dd($request->all());  
    }

    public function procesospago(Request $request)
    {
        $mes1 = $request->mes;
        $nproy = db::table('proyects')
            ->select('beneficios.proyect_id','proyects.proyecto','proyects.nivel','proyects.desc_proy','beneficios.id','beneficios.beneficio','beneficios.status','integrants.empleado_id','integrants.rol','integrants.pago','empleados.nombre','empleados.posicion',
            'empleados.depto','beneficios.fecha_gen','beneficios.num_pago','integrants.pago','empleados.cia','descuentos.descuento','descuentos.beneficio_id','descuentos.sap_id')
            ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            ->join('integrants', 'beneficios.proyect_id', '=', 'integrants.proyect_id')
            ->join('empleados', 'integrants.empleado_id', '=', 'empleados.id')
            ->leftjoin('descuentos', function ($join){
                $join->on('beneficios.id', '=', 'descuentos.beneficio_id')->on('descuentos.sap_id','=','integrants.empleado_id');
                })
            ->where('beneficios.status', '=', '2')
            ->orderBy('beneficios.proyect_id', 'asc')
            ->orderBy('integrants.rol', 'asc')
            //->groupby('beneficios.proyect_id')
            ->get(); 
        $cuenta = db::table('beneficios')
        ->select('id','proyect_id', db::raw('count(num_pago) as num_pago'))
        ->groupby('proyect_id')
        ->get(); 
            foreach($cuenta as $cuenta)
            {
                $id = $cuenta->id;
                $proyect_id = $cuenta->proyect_id;
                $num_pago = $cuenta->num_pago;
                $cuentas[] = array("id"=>$id,"proyect_id"=>$proyect_id,"num_pago"=>$num_pago);
            }
            $cuentas2 = $cuentas;
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
                            $num_pago = count($x->num_pago);
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
                        $num_pago = $x->num_pago;
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
                        $num_pago = $x->num_pago;
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
                           $num_pago = $x->num_pago;
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
                           $num_pago = $x->num_pago;
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
                        $num_pago = $x->num_pago;
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
                        $num_pago = $x->num_pago;
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
                           $num_pago = $x->num_pago;
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
                    }
                    $datafin[] = array("beneficio"=>$beneficio,"proyecto"=>$proyecto,"proyect_id"=>$proyect_id,"nivel"=>$nivel,"desc_proy"=>$desc_proy,"id"=>$id,"status"=>$status,"empleado_id"=>$empleado_id,"rol"=>$rol,"pago"=>$pago,
                                    "nombre"=>$nombre,"posicion"=>$posicion,"depto"=>$depto,"fecha_gen"=>$fecha_gen,"num_pago"=>$num_pago,"cia"=>$cia,"descuento"=>$descuento);         
                    $json = json_encode($datafin); 
                }
         //return view('proyects.pagos', compact('json','mes1'));
        dd($datafin,$cuentas2);  
    }

    public function desceuntoscrear(Request $request, Proyect $proyect, beneficio $beneficio)
    {
        $benef = $request->input('benefi'); 
        $desctot = DB::table('descuentos')
            ->where('beneficio_id','=',$benef)
            ->count();
        if (($desctot) > 0){
        $dat = db::table('proyects')
            ->select('beneficios.*', 'integrants.empleado_id', 'integrants.rol', 'integrants.pago', 'empleados.nombre', 'empleados.posicion','descuentos.sap_id', 'descuentos.descuento', 'descuentos.concepto')
            ->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            ->join('integrants', 'beneficios.proyect_id', '=', 'integrants.proyect_id')
            ->join('empleados', 'integrants.empleado_id', '=', 'empleados.id')
            ->join('descuentos', 'beneficios.id', '=', 'descuentos.beneficio_id')
            ->where('beneficios.proyect_id', '=',$proyect->id)
            ->where('beneficios.id', '=',$benef)    
            ->groupBy('empleado_id')
            ->orderBy('rol', 'asc')
            ->get();
            return view('proyects.descuentos', compact('dat', 'proyect', 'request', 'beneficio', 'benef', 'desctot'));
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
            return view('proyects.descuentos', compact('dat', 'proyect', 'request', 'beneficio', 'benef', 'desctot'));
        }
        //dd($desctot);  
    } 

    public function descuentostore(Request $request)
    {
        dd($request->all());
    }

    public function procesosave(Request $request)
    {
        // for($i=0; $i<count($request->beneficio); $i++)
        //     {
        //         $reconocimientos = new reconocimiento();
        //         $reconocimientos->beneficio_id = $request->beneficio[$i];
        //         $reconocimientos->empleado = $request->empleado[$i];
        //         $reconocimientos->pago = $request->pago[$i];
        //         $reconocimientos->save();
        //     }
        $uni = array_unique($request->beneficio);
        for($i=0; $i<count($uni); $i++)
            {
                $beneficios = beneficio::where('id', '=', $uni)->first();
                $beneficios->num_pago = $request->num_pago;
                $beneficios->mes_pago = $request->mes_pago;
                $beneficios->save();
           }
        $beneficio = beneficio::where('status', '=', 2)->first();
        $beneficio->status = 1;
        $beneficio->save();
            return redirect()->back()->with('info', 'Informacion Guardada con Exito!');      
        //dd($uni);
    }
}
