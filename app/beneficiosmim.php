<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beneficiosmim extends Model
{
    protected $fillable =[
        'id','fecha_gen','beneficio','status','num_pago','mes_pago'
    ];
      
    public function proyectsmim()
    {
        return $this->hasOne(proyectsmim::class, 'id', 'proyect_id');
    }
}
