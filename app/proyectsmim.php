<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectsmim extends Model
{
    protected $fillable =[
    'id','proyecto','fecha_reg','nivel','depto','asesor','fecha_ini','fecha_fin','comite','valor'
    ,'metodologia','ahorro_anual_proy','proy_status'
   ]; 
    public function beneficiosmim()
    {
        return $this->hasMany(beneficiosmim::class, 'proyect_id', 'id');
    }
}
