<?php

namespace AgrOnline;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='producto';
    protected $primaryKey='id_producto';
    public $timestamps=false;


    protected $fillable=[    	
    	'nombre_producto'
    ];

    protected $guardar =[

    ];
}
