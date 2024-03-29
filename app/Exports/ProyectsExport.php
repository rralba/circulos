<?php

namespace App\Exports;

use App\Proyect;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProyectsExport implements FromCollection, WithHeadings
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
        	return Proyect::all();
    	}
    	else{
    		return Proyect::where('proy_status', '=', $this->status)->get();
    	}
    }
    public function headings(): array
    {
        return [
            'id',
            'proyecto',
            'fecha reg',
            'nivel',
            'direccion',
            'subdireccion',
            'departamento',
            'asesor',
            'avance',
            'etapa',
            'inicio',
            'final',
            'fecha fin real',
            'comite',
            'valor',
            'metodologia',
            'ahorro anual',
            'metrico primario',
            'metrico secundario',
            'creativo',
            'areas participantes',
            'habilidades integrantes',
            'actividades principales',
            'conocimiento critico',
            'participacion sindicalizados',
            'empresa',
            'descuento',
            'status',
            'create',
            'update',
        ];
    }
}
