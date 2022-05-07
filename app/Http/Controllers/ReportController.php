<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\facades\Excel;
use App\Exports\ProyectsExport;
use App\Exports\MejorasExport;

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
        	return (new ProyectsExport($status))->download('proyectosactivos.xlsx');
    	}
    	if (($status) == 2){
        	return (new ProyectsExport($status))->download('proyectosterminados.xlsx');
    	}
    	if (($status) == 3){
        	return (new ProyectsExport($status))->download('proyectosen procesodepago.xlsx');
    	}
    	if (($status) == 0){
        	return (new ProyectsExport($status))->download('proyectoscancelados.xlsx');
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
    	if (($status) == 2){
        	return (new MejorasExport($status))->download('mejoras rapidas terminados.xlsx');
    	}
    	if (($status) == 0){
        	return (new MejorasExport($status))->download('mejoras rapidas cancelados.xlsx');
    	}
    	if (($status) > 3){
        	return (new MejorasExport($status))->download('mejoras rapidas.xlsx');
    	}
    }
}
