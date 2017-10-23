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

			{!!Form::model($vereda,['method'=>'PATCH','route'=>['vereda.update',$vereda->id_vereda]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre_vereda">Nombre Vereda</label>
            	<input type="text" name="nombre_vereda" class="form-control" value="{{$vereda->nombre_vereda}}" placeholder="Nombre Vereda...">
            </div>
            <div class="form-group">
            	<button class="btn btn-success" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection