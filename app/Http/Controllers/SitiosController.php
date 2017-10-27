<?php

namespace AgrOnline\Http\Controllers;

use Illuminate\Http\Request;

use AgrOnline\Http\Requests;
use AgrOnline\Sitios;
use Illuminate\Support\Facades\Redirect;
use AgrOnline\Http\Requests\SitiosFormRequest;
use DB;

class SitiosController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$sitios=DB::table('ubicacion as ub')->where('nombre_finca','LIKE','%'.$query.'%')
            ->join('administrador_finca as ad','ub.id_admin','=','ad.id_admin')
            ->join('vereda as ver','ub.id_vereda','=','ver.id_vereda')
            ->orwhere('nombre_finca','LIKE','%'.$query.'%')
    		->orderBy('nombre_finca','asc')
    		->paginate(6);
        
    		return view('sitios.index',["sitios"=>$sitios,"searchText"=>$query]);
    	}
    }
    public function create()
    {
        $admin=DB::table('administrador_finca')->orderBy('nombres_admin','asc')->get();
        $vereda=DB::table('vereda')->orderBy('nombre_vereda','asc')->get();
    	return view("sitios.create",["admin"=>$admin,"vereda"=>$vereda]);
    }
    public function store(SitiosFormRequest $request)
    {
    	$sitios=new Sitios;
    	$sitios->nombre_finca=$request->get('nombre_finca');
    	$sitios->id_admin=$request->get('id_admin');
        $sitios->id_vereda=$request->get('id_vereda');
    	$sitios->latitud=$request->get('latitud');
    	$sitios->longitud=$request->get('longitud');
    	$sitios->save();
    	return Redirect::to('sitios');
    }
    public function show($id_ubicacion)
    {
    	return view("sitios.show",["sitios"=>sitios::findOrFail($id_ubicacion)]);
    }
    public function edit($id_ubicacion)
    {
    	return view("sitios.edit",["sitios"=>sitios::findOrFail($id_ubicacion)]);
    }
    public function update(SitiosFormRequest $request,$id_ubicacion)
    {
    	$sitios=sitios::findOrFail($id_ubicacion);
    	$sitios->nombre_finca=$request->get('nombre_finca');
    	$sitios->id_admin=$request->get('id_admin');
    	$sitios->latitud=$request->get('latitud');
    	$sitios->longitud=$request->get('longitud');
    	$sitios->id_vereda=$request->get('id_vereda');
    	$sitios->update();
    	return Redirect::to('sitios');
    }
    public function destroy($id_ubicacion)
    {
    	$sitios=sitios::findOrFail($id_ubicacion);
    	$sitios->destroy($id_ubicacion);
    	return Redirect::to('sitios');
    }
}