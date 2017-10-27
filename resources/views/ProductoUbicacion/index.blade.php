@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Productos Lugares <a href="ProductoUbicacion/create">
			<button class='btn btn-success'><span class="fa fa-plus"></span>Nuevo</button></a></h3>
			@include('ProductoUbicacion.search')
		</div>
	</div>
	<div class="row">
		<div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Nombre Finca</th>
						<th>Nombre Producto</th>
						<th>Cantidad</th>
					</thead>
					@foreach ($ubicacion_producto as $pu)
					<tr>
						<td>{{$pu->id_ubicacion_producto}}</td>
						<td>{{$pu->nombre_finca}}</td>
						<td>{{$pu->nombre_producto}}</td>
						<td>{{$pu->cantidad}}</td>
						<td>
							<a href="{{URL::action('ProductoUbicacionController@edit',$pu->id_ubicacion_producto)}}"><button class="btn btn-success"><span class="fa fa-edit"></span>Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pu->id_ubicacion_producto}}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span>Eliminar</button></a>
						</td>
					</tr>
					@include('ProductoUbicacion.modal')	
					@endforeach			
				</table>
			</div>
			{{$ubicacion_producto->render()}}
		</div>
	</div>
@endsection
