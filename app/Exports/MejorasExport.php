<?php

namespace App\Exports;

use App\mejora;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MejorasExport implements FromCollection, WithHeadings
{
	use Exportable;
 	protected $status;

 	public function __construct($status = null)
    {
        $this->status = $status;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if (($this->status) == 4){
        	return mejora::select('id','registro','direccion','subdireccion','departamento','valor','desperdicio','inicio','final','asesor','gpagos','status','inicior','finr','fecha_terminacion','mes_terminacion','pers1','pers2','perco','rcr','ppp','beneficio','amejorar','objetivo','solucion')
        	->get();
    	}
    	else{
    		return mejora::select('id','registro','direccion','subdireccion','departamento','valor','desperdicio','inicio','final','asesor','gpagos','status','inicior','finr','fecha_terminacion','mes_terminacion','pers1','pers2','perco','rcr','ppp','beneficio','amejorar','objetivo','solucion')
    		->where('status', '=', $this->status)
        	->get();
    	}
    }
    public function headings(): array
    {
        return [
            'id',
            'registro',
            'direccion',
            'subdireccion',
            'departamento',
            'valor',
            'desperdicio',
            'inicio',
            'final',
            'asesor',
            'gpagos',
            'status',
            'inicior',
            'finr',
            'fecha_terminacion',
            'mes_terminacion',
            'per1',
            'pers2',
            'perco',
            'rcr',
            'ppp',
            'beneficio',
            'amejorar',
            'objetivo',
            'solucion',
        ];
    }
}
