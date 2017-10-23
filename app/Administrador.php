<?php

namespace AgrOnline;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table='administrador_finca';
    protected $primaryKey='id_admin';
    public $timestamps=false;


    protected $fillable=[
    	'nombres_admin',
    	'apellidos_admin'
    ];

    protected $guardar =[

    ];
}
