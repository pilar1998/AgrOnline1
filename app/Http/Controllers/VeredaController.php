<?php

namespace AgrOnline\Http\Controllers;

use Illuminate\Http\Request;

use AgrOnline\Http\Requests;
use AgrOnline\Administrador;
use Illuminate\Support\Facades\Redirect;
use AgrOnline\Http\Requests\AdministradorFormRequest;
use DB;

class VeredaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$vereda=DB::table('vereda')->where('id_vereda','LIKE','%'.$query.'%')
            ->orwhere('nombre_vereda','LIKE','%'.$query.'%')
    		->orderBy('nombre_vereda','asc')
    		->paginate(6);
        
    		return view('vereda.index',["vereda"=>$vereda,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view("vereda.create");
    }
    public function store(AdministradorFormRequest $request)
    {
    	$administrador_finca=new administrador;
        $administrador_finca->id_admin=$request->get('id_admin');
    	$administrador_finca->nombres_admin=$request->get('nombres_admin');
    	$administrador_finca->apellidos_admin=$request->get('apellidos_admin');
    	$administrador_finca->save();
    	return Redirect::to('administrador_finca');
    }
    public function show($id_admin)
    {
    	return view("administrador_finca.show",["administrador_finca"=>Administrador::findOrFail($id_admin)]);
    }
    public function edit($id_admin)
    {
    	return view("administrador_finca.edit",["administrador_finca"=>Administrador::findOrFail($id_admin)]);
    }
    public function update(AdministradorFormRequest $request,$id_admin)
    {
    	$administrador_finca=administrador::findOrFail($id_admin);
    	$administrador_finca->nombres_admin=$request->get('nombres_admin');
    	$administrador_finca->apellidos_admin=$request->get('apellidos_admin');
    	$administrador_finca->update();
    	return Redirect::to('administrador_finca');
    }
    public function destroy($id_admin)
    {
    	$administrador=Administrador::findOrFail($id_admin);
    	$administrador->destroy($id_admin);
    	return Redirect::to('administrador_finca');
    }
}