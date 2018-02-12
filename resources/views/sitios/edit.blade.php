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
                  <input type="text" name="oldnombre_finca" class="form-group" value="{{$sitios->nombre_finca}}" placeholder="Nombre Finca..." style="visibility: hidden">
            	<input type="text" name="nombre_finca" class="form-control" value="{{$sitios->nombre_finca}}" placeholder="Nombre Finca...">
            </div>            
                  <div class="form-group">
                        <label for="id_admin">Nombre Administrador Finca</label>
                        <select name="id_admin" class="form-control">
                         @foreach ($admin as $ad) 
                              @if ($sitios->id_admin==$ad->id_admin)
                              <option name='id_admin' value="{{$ad->id_admin}}" selected>{{$ad->nombres_admin}}</option>
                              @else
                              <option name='id_admin' value="{{$ad->id_admin}}">{{$ad->nombres_admin}}</option>
                              @endif
                         @endforeach    
                        </select>
                  </div>

                  <div class="form-group">
                        <label for="id_vereda">Nombre Vereda</label>
                        <select name="id_vereda" class="form-control">
                         @foreach ($vereda as $ver) 
                              @if ($sitios->id_vereda==$ver->id_vereda)
                              <option name='id_vereda' value="{{$ver->id_vereda}}" selected>{{$ver->nombre_vereda}}</option>
                              @else
                              <option name='id_vereda' value="{{$ver->id_vereda}}" >{{$ver->nombre_vereda}}</option>
                              @endif
                         @endforeach    
                        </select>
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