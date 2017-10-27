@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Productos <a href="productos/create"><button class='btn btn-success'><span class="fa fa-plus"></span>Nuevo</button></a></h3>
			@include('productos.search')
		</div>
	</div>
	<div class="row">
		<div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID Producto</th>
						<th>Nombre Producto</th>
						<th>Cantidad Canastillas</th>
						<th>Opciones</th>
					</thead>
					@foreach ($productos as $pro)
					<tr>
						<td>{{$pro->id_producto}}</td>
						<td>{{$pro->nombre_producto}}</td>
						<td>{{$pro->cantidad_total}}</td>
						<td>
							<a href="{{URL::action('ProductosController@edit',$pro->id_producto)}}"><button class="btn btn-success"><span class="fa fa-edit"></span>Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pro->id_producto}}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span>Eliminar</button></a>
						</td>
					</tr>
					@include('productos.modal')	
					@endforeach			
				</table>
			</div>
			{{$productos->render()}}
		</div>
	</div>
@endsection
