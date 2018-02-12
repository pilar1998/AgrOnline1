<?php

namespace AgrOnline\Http\Controllers;

use Illuminate\Http\Request;

use AgrOnline\Http\Requests;
use AgrOnline\Sitios;
use Illuminate\Support\Facades\Redirect;
use AgrOnline\Http\Requests\SitiosFormRequest;
use DB;

class MapaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	$marker=DB::table('administrador_finca as ad')
    		->join('ubicacion as ub','ub.id_admin','=','ad.id_admin');        
    	return view('mapa.index',["marker"=>$marker]);
    	
    }
    
}