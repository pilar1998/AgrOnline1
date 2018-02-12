<?php

namespace AgrOnline\Http\Controllers;

use Illuminate\Http\Request;

use AgrOnline\Http\Requests;
use AgrOnline\Productos;
use Illuminate\Support\Facades\Redirect;
use AgrOnline\Http\Requests\ProductosFormRequest;
use DB;

class ProductosController extends Controller
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
    		$productos=DB::table('producto')
            ->where('nombre_producto','LIKE','%'.$query.'%')
    		->orderBy('nombre_producto','asc')
    		->paginate(6);
        
    		return view('productos.index',["productos"=>$productos,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view("productos.create");
    }
    public function store(productosFormRequest $request)
    {
    	$productos=new productos;
    	$productos->nombre_producto=$request->get('nombre_producto');
    	$productos->save();
    	return Redirect::to('productos');
    }
    public function show($id_producto)
    {
    	return view("productos.show",["productos"=>productos::findOrFail($id_producto)]);
    }
    public function edit($id_producto)
    {        
        return view("productos.edit",["productos"=>productos::findOrFail($id_producto)]);      	
    }
    public function update(ProductosFormRequest $request,$id_producto)
    {
    	$productos=productos::findOrFail($id_producto);
    	$productos->nombre_producto=$request->get('nombre_producto');
    	$productos->update();
    	return Redirect::to('productos');
    }
    public function destroy($id_producto)    {
    	$productos=productos::findOrFail($id_producto);
    	$productos->destroy($id_producto);
    	return Redirect::to('productos');
    }
}
