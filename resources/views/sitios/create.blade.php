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
            </div>
      </div>
            <script>
                  function validar(e) {
                        tecla = window.event ? window.event.keyCode : e.which;
                        valor=document.getElementById('latitud').value;
                        if (tecla == 8)
                              return true;
                        if (tecla==45 && valor.indexOf("-")==-1)
                              document.getElementById('latitud').value="-"+valor;
                        if (tecla==46 && valor.indexOf(".")==-1)
                              return true;
                        
                        patron = /\d/;
                        te = String.fromCharCode(tecla);
                        return patron.test(te);
                  }
                  function validarl(e) {
                        tecla = (document.all) ? e.keyCode : e.which;
                        valor=document.getElementById('longitud').value;
                        if (tecla==45 && valor.indexOf("-")==-1)
                              document.getElementById('longitud').value="-"+valor;
                        if (tecla==46 && valor.indexOf(".")==-1)
                              return true;

                        if (tecla == 8)
                              return true;
                        patron = /\d/;
                        te = String.fromCharCode(tecla);
                        return patron.test(te);
                  }

                  function validarlet(e) {
                        tecla = window.event ? window.event.keyCode : e.which;
                        if (tecla == 8)
                              return true;
                        
                        patron = /[A-Za-z\s]/;
                        te = String.fromCharCode(tecla);
                        return patron.test(te);
                  }
      
            </script>

			{!!Form::open(array('url'=>'sitios','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
            	<label for="nombre_finca">Nombre Finca</label>
            	<input type="text" name="nombre_finca" class="form-control"  placeholder="Nombre Finca..." onkeypress="return validarlet(event);">
            </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                        <label for="id_admin">Nombre Administrador Finca</label>
                        <select name="id_admin" class="form-control">
                         @foreach ($admin as $ad) 
                              <option name='id_admin' value="{{$ad->id_admin}}">{{$ad->nombres_admin}}</option>
                         @endforeach    
                        </select>
                  </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                        <label for="id_vereda">Nombre Vereda</label>
                        <select name="id_vereda" class="form-control">
                         @foreach ($vereda as $ver) 
                              <option name='id_vereda' value="{{$ver->id_vereda}}">{{$ver->nombre_vereda}}</option>
                         @endforeach    
                        </select>
                  </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  	<label for="latitud">Latitud</label>
                  	<input type="text" name="latitud" class="form-control"  id="latitud" placeholder="Latitud..."  onkeypress="return validar(event);">
                  </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  	<label for="longitud">Longitud</label>
                  	<input type="text" name="longitud" class="form-control" id="longitud" placeholder="Longitud..."  onkeypress="return validarl(event);">
                  </div>
            </div>
            <div class="form-group">
            	<button class="btn btn-success" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection