@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Administrador Finca</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
                  <script>
                        function validar(e) {
                              tecla = (document.all) ? e.keyCode : e.which;
                              if (tecla == 8)
                                    return true;
                              patron = /\d/;
                              te = String.fromCharCode(tecla);
                              return patron.test(te);
                        }
            
                  </script>

			{!!Form::open(array('url'=>'administrador_finca','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Cedula Administrador</label>
            	<input type="text" name="cedula" class="form-control" placeholder="Cedula..." onkeypress="return validar(event)">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombres Administrador</label>
            	<input type="text" name="nombres_admin" class="form-control" placeholder="Nombres...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Apellidos Administrador</label>
            	<input type="text" name="apellidos_admin" class="form-control" placeholder="Apellidos...">
            </div>
            <div class="form-group">
            	<button class="btn btn-success" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection