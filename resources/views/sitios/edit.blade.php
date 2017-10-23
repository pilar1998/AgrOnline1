@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Sitio: {{ $sitios->id_ubicacion}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($sitios,['method'=>'PATCH','route'=>['sitios.update',$sitios->id_ubicacion]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre_finca">Nombre Finca</label>
            	<input type="text" name="nombre_Finca" class="form-control" value="{{$sitios->nombre_Finca}}" placeholder="Nombre Finca...">
            </div>
            <div class="form-group">
            	<label for="id_admin">ID Administrador</label>
            	<input type="text" name="id_admin" class="form-control" value="{{$sitios->id_admin}}" placeholder="ID Administrador...">
            	@include('administrador_finca.search')
            </div>
            <div class="form-group">
            	<label for="id_vereda">ID Vereda</label>
            	<input type="text" name="id_vereda" class="form-control" value="{{$sitios->id_vereda}}" placeholder="ID Vereda...">
            	@include('vereda.search')
            </div>
            <div class="form-group">
            	<label for="latitud">Latitud</label>
            	<input type="text" name="latitud" class="form-control" value="{{$sitios->latitud}}" placeholder="Latitud...">
            </div>
            <div class="form-group">
            	<label for="longitud">Longitud</label>
            	<input type="text" name="longitud" class="form-control" value="{{$sitios->longitud}}" placeholder="Longitud...">
            </div>
            <div class="form-group">
            	<button class="btn btn-success" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection