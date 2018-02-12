<?php

namespace AgrOnline\Http\Controllers;

use Illuminate\Http\Request;

use AgrOnline\Http\Requests;
use AgrOnline\Administrador;
use Illuminate\Support\Facades\Redirect;
use AgrOnline\Http\Requests\AdministradorFormRequest;
use DB;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$administrador=DB::table('administrador_finca')->where('cedula','LIKE','%'.$query.'%')
            ->orwhere('nombres_admin','LIKE','%'.$query.'%')
            ->orwhere('apellidos_admin','LIKE','%'.$query.'%')
    		->orderBy('nombres_admin','asc')
    		->paginate(6);
        
    		return view('administrador_finca.index',["administrador_finca"=>$administrador,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view("administrador_finca.create");
    }
    public function store(AdministradorFormRequest $request)
    {
    	$administrador_finca=new administrador;
        $administrador_finca->cedula=$request->get('cedula');
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
        $administrador_finca->cedula=$request->get('cedula');
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
