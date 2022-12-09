<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectsher extends Model
{
	protected $fillable =[
    'id','proyecto','fecha_reg','nivel','depto','asesor','fecha_ini','fecha_fin','comite','valor'
    ,'metodologia','ahorro_anual_proy','proy_status'
   ]; 
    public function beneficiosher()
    {
        return $this->hasMany(beneficiosher::class, 'proyect_id', 'id');
    }
}
