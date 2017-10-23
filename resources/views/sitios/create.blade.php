@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Lugar</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'sitios','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre_finca">Nombre Finca</label>
            	<input type="text" name="nombre_Finca" class="form-control"  placeholder="Nombre Finca...">
            </div>
            <div class="form-group">
            	<label for="id_admin">ID Administrador</label>
            	<input type="text" name="id_admin" class="form-control"  placeholder="ID Administrador...">
            	@include('administrador_finca.search')
            </div>
            <div class="form-group">
            	<label for="id_vereda">ID Vereda</label>
            	<input type="text" name="id_vereda" class="form-control"  placeholder="ID Vereda...">
            	@include('vereda.search')
            </div>
            <div class="form-group">
            	<label for="latitud">Latitud</label>
            	<input type="text" name="latitud" class="form-control"  placeholder="Latitud...">
            </div>
            <div class="form-group">
            	<label for="longitud">Longitud</label>
            	<input type="text" name="longitud" class="form-control"  placeholder="Longitud...">
            </div>
            <div class="form-group">
            	<button class="btn btn-success" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection