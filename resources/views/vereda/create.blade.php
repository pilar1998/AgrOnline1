@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Vereda</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'vereda','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre_vereda">Nombre Vereda</label>
            	<input type="text" name="nombre_vereda" class="form-control" placeholder="Nombre Vereda...">
            </div>
            <div class="form-group">
            	<button class="btn btn-success" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>         

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection