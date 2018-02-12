@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Lugares <a href="sitios/create"><button class='btn btn-success'><span class="fa fa-plus"></span>Nuevo</button></a></h3>
			@include('sitios.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID Ubicacion</th>
						<th>Nombre Finca</th>
						<th>Administrador</th>
						<th>Vereda</th>
						<th>Latitud</th>
						<th>Longitud</th>
						<th>Cantidad Canastillas</th>
						<th>Opciones</th>
					</thead>
					@foreach ($sitios as $sit)
					<tr>
						<td>{{$sit->id_ubicacion}}</td>
						<td>{{$sit->nombre_finca}}</td>
						<td>{{$sit->nombres_admin}}</td>
						<td>{{$sit->nombre_vereda}}</td>
						<td>{{$sit->latitud}}</td>
						<td>{{$sit->longitud}}</td>
						<td>{{$sit->cantidadto}}</td>
						<td>
							<a href="{{URL::action('SitiosController@edit',$sit->id_ubicacion)}}"><button class="btn btn-success"><span class="fa fa-edit"></span>Editar</button></a>
							<a href="" data-target="#modal-delete-{{$sit->id_ubicacion,$sit->nombre_finca}}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span>Eliminar</button></a>
						</td>
					</tr>
					@include('sitios.modal')	
					@endforeach			
				</table>
			</div>
			{{$sitios->render()}}
		</div>
	</div>
@endsection

