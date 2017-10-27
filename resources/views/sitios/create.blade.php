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

			{!!Form::open(array('url'=>'sitios','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
            	<label for="nombre_finca">Nombre Finca</label>
            	<input type="text" name="nombre_finca" class="form-control"  placeholder="Nombre Finca...">
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
                  	<input type="text" name="latitud" class="form-control"  placeholder="Latitud...">
                  </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  	<label for="longitud">Longitud</label>
                  	<input type="text" name="longitud" class="form-control"  placeholder="Longitud...">
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