@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Administradores <a href="administrador_finca/create"><button class='btn btn-success'><span class="fa fa-plus"></span>Nuevo</button></a></h3>
			@include('administrador_finca.search')
		</div>
	</div>
	<div class="row">
		<div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Cedula</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Opciones</th>
					</thead>
					@foreach ($administrador_finca as $ad)
					<tr>
						<td>{{$ad->cedula}}</td>
						<td>{{$ad->nombres_admin}}</td>
						<td>{{$ad->apellidos_admin}}</td>
						<td>
							<a href="{{URL::action('AdministradorController@edit',$ad->id_admin)}}"><button class="btn btn-success"><span class="fa fa-edit"></span>Editar</button></a>
							<a href="" data-target="#modal-delete-{{$ad->id_admin}}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span>Eliminar</button></a>
						</td>
					</tr>
					@include('administrador_finca.modal')	
					@endforeach			
				</table>
			</div>
			{{$administrador_finca->render()}}
		</div>
	</div>
@endsection
