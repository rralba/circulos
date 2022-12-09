<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectsnas extends Model
{
    protected $fillable =[
    'id','proyecto','fecha_reg','nivel','depto','asesor','fecha_ini','fecha_fin','comite','valor'
    ,'metodologia','ahorro_anual_proy','proy_status'
   ]; 
    public function beneficiosnas()
    {
        return $this->hasMany(beneficiosnas::class, 'proyect_id', 'id');
    }
}
