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
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$vereda=DB::table('vereda')->where('nombre_vereda','LIKE','%'.$query.'%')
            ->orwhere('municipio_vereda','LIKE','%'.$query.'%')
            ->orwhere('departamento_vereda','LIKE','%'.$query.'%')
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
        $vereda->municipio_vereda=$request->get('municipio_vereda');
        $vereda->departamento_vereda=$request->get('departamento_vereda');
    	$vereda->save();
    	return Redirect::to('vereda');
    }
    public function show($id_vereda)
    {
    	return view("vereda.show",["vereda"=>vereda::findOrFail($id_vereda)]);
    }
    public function edit($id_vereda)
    {
    	return view("vereda.edit",["vereda"=>vereda::findOrFail($id_vereda)]);
    }
    public function update(VeredaFormRequest $request,$id_vereda)
    {
    	$vereda=vereda::findOrFail($id_vereda);
    	$vereda->nombre_vereda=$request->get('nombre_vereda');
    	$vereda->municipio_vereda=$request->get('municipio_vereda');
        $vereda->departamento_vereda=$request->get('departamento_vereda');
    	$vereda->update();
    	return Redirect::to('vereda');
    }
    public function destroy($id_vereda)
    {
    	$vereda=Vereda::findOrFail($id_vereda);
    	$vereda->destroy($id_vereda);
    	return Redirect::to('vereda');
    }
}