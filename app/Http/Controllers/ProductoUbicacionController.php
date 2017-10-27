<?php

namespace AgrOnline\Http\Controllers;

use Illuminate\Http\Request;
use AgrOnline\Http\Requests;
use AgrOnline\ProductoUbicacion;
use Illuminate\Support\Facades\Redirect;
use AgrOnline\Http\Requests\ProductoUbicacionFormRequest;
use DB;

class ProductoUbicacionController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$ubi_pro=DB::table('ubicacion_producto as up')->where('id_ubicacion_producto','LIKE','%'.$query.'%')
    		->join('producto as pro','up.id_producto','=','pro.id_producto')
    		->join('ubicacion as ub','up.id_ubicacion','=','ub.id_ubicacion')
    		->orwhere('nombre_finca','LIKE','%'.$query.'%')
    		->orwhere('nombre_producto','LIKE','%'.$query.'%')
    		->orwhere('cantidad','LIKE','%'.$query.'%')
    		->orderBy('id_ubicacion_producto','asc')
    		->paginate(6);
        
    		return view('ProductoUbicacion.index',["ubicacion_producto"=>$ubi_pro,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	$producto=DB::table('producto')->orderBy('nombre_producto','asc')->get();
    	$ubicacion=DB::table('ubicacion')->orderBy('nombre_finca','asc')->get();
    	return view("ProductoUbicacion.create",["productos"=>$producto,"ubicacion"=>$ubicacion]);
    }
    public function store(ProductoUbicacionFormRequest $request)
    {
    	$productos=new ProductoUbicacion;
        $productos->id_producto=$request->get('id_producto');
    	$productos->id_ubicacion=$request->get('id_ubicacion');
    	$productos->cantidad=$request->get('cantidad');
    	$productos->save();
    	return Redirect::to('ProductoUbicacion');
    }
    public function show($id_ubicacion_producto)
    {
    	return view("ProductoUbicacion.show",["ubicacion_producto"=>ProductoUbicacion::findOrFail($id_ubicacion_producto)]);
    }
    public function edit($id_ubicacion_producto)
    {        
    	$ubicacion_producto=ProductoUbicacion::findOrFail($id_ubicacion_producto);
    	$producto=DB::table('producto')->orderBy('nombre_producto','asc')->get();
    	$ubicacion=DB::table('ubicacion')->orderBy('nombre_finca','asc')->get();
        return view("ProductoUbicacion.edit",["productos"=>$producto,"ubicacion"=>$ubicacion,"ubicacion_producto"=>$ubicacion_producto]);      	
    }
    public function update(ProductoUbicacionFormRequest $request,$id_ubicacion_producto)
    {
    	$productos=ProductoUbicacion::findOrFail($id_ubicacion_producto);
    	$productos->cantidad=$request->get('cantidad');
    	$productos->update();
    	return Redirect::to('ProductoUbicacion');
    }
    public function destroy($id_ubicacion_producto)    {
    	$productos=ProductoUbicacion::findOrFail($id_ubicacion_producto);
    	$productos->destroy($id_ubicacion_producto);
    	return Redirect::to('ProductoUbicacion');
    }
}
