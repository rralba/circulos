<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beneficiosher extends Model
{
    protected $fillable =[
        'id','fecha_gen','beneficio','status','num_pago','mes_pago'
    ];
      
    public function proyectsher()
    {
        return $this->hasOne(proyectsher::class, 'id', 'proyect_id');
    }
}
