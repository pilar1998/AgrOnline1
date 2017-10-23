<?php

namespace AgrOnline;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table='ubicacion';
    protected $primaryKey='id_ubicacion';
    public $timestamps=false;


    protected $fillable=[
    	'nombre_finca',
        'id_admin',
        'id_vereda',
    	'latitud',
    	'longitud'
    ];

    protected $guardar =[

    ];
}
