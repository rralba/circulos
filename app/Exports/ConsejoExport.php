<?php

namespace App\Exports;

use App\beneficio;
use App\beneficiosher;
use App\beneficiosmim;
use App\beneficiosnas;
use App\Proyect;
use App\Proyectsher;
use App\Proyectsmim;
use App\Proyectsnas;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ConsejoExport implements FromCollection, WithHeadings
{
    use Exportable;
 	protected $status;
 	protected $todo;

 	public function __construct($status = null, $todo = null, $año = null)
    {
        $this->status = $status;
        $this->todo = $todo;
        $this->año = $año;
    }

    public function collection()
    {
    	switch($this->status){
    		case 0:
    			if (($this->todo) == 1){
    				return db::table('proyects')
            			->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            			->select('proyects.proyecto','beneficios.fecha_gen','beneficios.beneficio','beneficios.foliopago','beneficios.num_pago','beneficios.created_at')
            			->where('beneficios.status', '=', '1')
            			->get();
    			}
    			else{
    				return db::table('proyects')
            			->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            			->select('proyects.proyecto','beneficios.fecha_gen','beneficios.beneficio','beneficios.foliopago','beneficios.num_pago','beneficios.created_at')
            			->where('beneficios.status', '=', '1')
            			->whereYear("fecha_gen","=",$this->año)
            			->get();
    			}
    		break;
    		case 1:
    			if (($this->todo) == 1){
    				return db::table('Proyectsnas')
            			->join('beneficiosnas', 'Proyectsnas.id', '=', 'beneficiosnas.proyect_id')
            			->select('Proyectsnas.proyecto','beneficiosnas.fecha_gen','beneficiosnas.beneficio','beneficiosnas.num_pago','beneficiosnas.created_at')
            			->where('beneficiosnas.status', '=', '1')
            			->get();
    			}
    			else{
    				return db::table('Proyectsnas')
            			->join('beneficiosnas', 'Proyectsnas.id', '=', 'beneficiosnas.proyect_id')
            			->select('Proyectsnas.proyecto','beneficiosnas.fecha_gen','beneficiosnas.beneficio','beneficiosnas.num_pago','beneficiosnas.created_at')
            			->where('beneficiosnas.status', '=', '1')
            			->whereYear("fecha_gen","=",$this->año)
            			->get();
    			}
    		break;
    		case 2:
    			if (($this->todo) == 1){
    				return db::table('proyectshers')
            			->join('beneficioshers', 'proyectshers.id', '=', 'beneficioshers.proyect_id')
            			->select('proyectshers.proyecto','beneficioshers.fecha_gen','beneficioshers.beneficio','beneficioshers.num_pago','beneficioshers.created_at')
            			->where('beneficioshers.status', '=', '1')
            			->get();
    			}
    			else{
    				return db::table('proyectshers')
            			->join('beneficioshers', 'proyectshers.id', '=', 'beneficioshers.proyect_id')
            			->select('proyectshers.proyecto','beneficioshers.fecha_gen','beneficioshers.beneficio','beneficioshers.num_pago','beneficioshers.created_at')
            			->where('beneficioshers.status', '=', '1')
            			->whereYear("fecha_gen","=",$this->año)
            			->get();
    			}
    		break;
    		case 3:
    			if (($this->todo) == 1){
    				return db::table('proyectsmims')
            			->join('beneficiosmims', 'proyectsmims.id', '=', 'beneficiosmims.proyect_id')
            			->select('proyectsmims.proyecto','beneficiosmims.fecha_gen','beneficiosmims.beneficio','beneficiosmims.num_pago','beneficiosmims.created_at')
            			->where('beneficiosmims.status', '=', '1')
            			->get();
    			}
    			else{
    				return db::table('proyectsmims')
            			->join('beneficiosmims', 'proyectsmims.id', '=', 'beneficiosmims.proyect_id')
            			->select('proyectsmims.proyecto','beneficiosmims.fecha_gen','beneficiosmims.beneficio','beneficiosmims.num_pago','beneficiosmims.created_at')
            			->where('beneficiosmims.status', '=', '1')
            			->whereYear("fecha_gen","=",$this->año)
            			->get();
    			}
    		break;
    		case 4:
    			return db::table('proyects')
            		->join('beneficios', 'proyects.id', '=', 'beneficios.proyect_id')
            		->select('proyects.proyecto','beneficios.fecha_gen','beneficios.beneficio','beneficios.foliopago','beneficios.num_pago','beneficios.created_at')
            		->where('beneficios.status', '=', '1')
            		->whereYear("fecha_gen","=",$this->año)
            		->where('beneficios.num_pago', '<', '13')
            		->get();
            		//dd($this->año);
    		break;
    		case 5:
    			return db::table('proyectsnas')
            		->join('beneficiosnas', 'proyectsnas.id', '=', 'beneficiosnas.proyect_id')
            		->select('proyectsnas.proyecto','beneficiosnas.fecha_gen','beneficiosnas.beneficio','beneficiosnas.num_pago','beneficiosnas.created_at')
            		->where('beneficiosnas.status', '=', '1')
            		->whereYear("fecha_gen","=",$this->año)
            		->where('beneficiosnas.num_pago', '<', '13')
            		->get();
    		break;
    		case 6:
    			return db::table('proyectshers')
            		->join('beneficioshers', 'proyectshers.id', '=', 'beneficioshers.proyect_id')
            		->select('proyectshers.proyecto','beneficioshers.fecha_gen','beneficioshers.beneficio','beneficioshers.num_pago','beneficioshers.created_at')
            		->where('beneficioshers.status', '=', '1')
            		->whereYear("fecha_gen","=",$this->año)
            		->where('beneficioshers.num_pago', '<', '13')
            		->get();
    		break;
    		case 7:
    			return db::table('proyectsmims')
            		->join('beneficiosmims', 'proyectsmims.id', '=', 'beneficiosmims.proyect_id')
            		->select('proyectsmims.proyecto','beneficiosmims.fecha_gen','beneficiosmims.beneficio','beneficiosmims.num_pago','beneficiosmims.created_at')
            		->where('beneficiosmims.status', '=', '1')
            		->whereYear("fecha_gen","=",$this->año)
            		->where('beneficiosmims.num_pago', '<', '13')
            		->get();
    		break;
    	}
    	//dd($this->todo, $this->año, $this->status);
    }
    public function headings(): array
    {
        return [
            'proyecto',
            'fecha_gen',
            'beneficio',
            'folio',
            '#pago',
            'fecha pago',
        ];
    }
}
