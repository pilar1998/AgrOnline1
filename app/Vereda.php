<?php

namespace AgrOnline;

use Illuminate\Database\Eloquent\Model;

class Veredas extends Model
{
    protected $table='vereda';
    protected $primaryKey='id_vereda';
    public $timestamps=false;


    protected $fillable=[
    	'nombre_vereda'
    ];

    protected $guardar =[

    ];
}