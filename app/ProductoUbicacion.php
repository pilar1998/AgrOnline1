<?php

namespace AgrOnline;

use Illuminate\Database\Eloquent\Model;

class ProductoUbicacion extends Model
{
    protected $table='ubicacion_producto';
    protected $primaryKey='id_ubicacion_producto';
    public $timestamps=false;


    protected $fillable=[    	
    	'id_ubicacion',
    	'id_producto',
    	'cantidad'
    ];

    protected $guardar =[

    ];
}
