<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beneficiosnas extends Model
{
    protected $fillable =[
        'id','fecha_gen','beneficio','status','num_pago','mes_pago'
    ];
      
    public function proyectsnas()
    {
        return $this->hasOne(proyectsnas::class, 'id', 'proyect_id');
    }
}
