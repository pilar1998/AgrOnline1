<?php

namespace AgrOnline\Http\Controllers;

use Illuminate\Http\Request;

use AgrOnline\Http\Requests;
use AgrOnline\Vereda;
use Illuminate\Support\Facades\Redirect;
use AgrOnline\Http\Requests\VeredaFormRequest;
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
    public function store(VeredaFormRequest $request)
    {
    	$vereda=new Vereda;
    	$vereda->nombre_vereda=$request->get('nombre_vereda');
    	$vereda->save();
    	return Redirect::to('vereda');
    }
    public function show($id_vereda)
    {
    	return view("administrador_finca.show",["administrador_finca"=>Administrador::findOrFail($id_vereda)]);
    }
    public function edit($id_vereda)
    {
    	return view("administrador_finca.edit",["administrador_finca"=>Administrador::findOrFail($id_vereda)]);
    }
    public function update(VeredaFormRequest $request,$id_vereda)
    {
    	$administrador_finca=administrador::findOrFail($id_vereda);
    	$administrador_finca->nombres_admin=$request->get('nombres_admin');
    	$administrador_finca->apellidos_admin=$request->get('apellidos_admin');
    	$administrador_finca->update();
    	return Redirect::to('administrador_finca');
    }
    public function destroy($id_vereda)
    {
    	$administrador=Vereda::findOrFail($id_vereda);
    	$administrador->destroy($id_vereda);
    	return Redirect::to('administrador_finca');
    }
}