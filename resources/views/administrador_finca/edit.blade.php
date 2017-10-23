@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Administrador Finca: {{ $administrador_finca->id_admin}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($administrador_finca,['method'=>'PATCH','route'=>['administrador_finca.update',$administrador_finca->id_admin]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombres_admin">Nombres</label>
            	<input type="text" name="nombres_admin" class="form-control" value="{{$administrador_finca->nombres_admin}}" placeholder="Nombres...">
            </div>
            <div class="form-group">
            	<label for="apellidos_admin">Apellidos</label>
            	<input type="text" name="apellidos_admin" class="form-control" value="{{$administrador_finca->apellidos_admin}}" placeholder="Apellidos...">
            </div>
            <div class="form-group">
            	<button class="btn btn-success" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection