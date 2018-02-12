@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Veredas <a href="vereda/create"><button class='btn btn-success'><span class="fa fa-plus"></span>Nuevo</button></a></h3>
			@include('vereda.search')
		</div>
	</div>
	<div class="row">
		<div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID Vereda</th>
						<th>Nombre Vereda</th>
						<th>Municipio Vereda</th>
						<th>Departamento Vereda</th>
						<th>Opciones</th>
					</thead>
					@foreach ($vereda as $ver)
					<tr>
						<td>{{$ver->id_vereda}}</td>
						<td>{{$ver->nombre_vereda}}</td>
						<td>{{$ver->municipio_vereda}}</td>
						<td>{{$ver->departamento_vereda}}</td>
						<td>
							<a href="{{URL::action('VeredaController@edit',$ver->id_vereda)}}"><button class="btn btn-success"><span class="fa fa-edit"></span>Editar</button></a>
							<a href="" data-target="#modal-delete-{{$ver->id_vereda}}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span>Eliminar</button></a>
						</td>
					</tr>
					@include('vereda.modal')	
					@endforeach			
				</table>
			</div>
			{{$vereda->render()}}
		</div>
	</div>
@endsection

