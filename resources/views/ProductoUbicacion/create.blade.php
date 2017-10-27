@extends ('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto Finca</h3>
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


			{!!Form::open(array('url'=>'ProductoUbicacion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  	<label for="nombre">Nombre Finca</label>
                  	<select name="id_ubicacion" class="form-control">
                         @foreach ($ubicacion as $ub) 
                              <option name='id_ubicacion' value="{{$ub->id_ubicacion}}">{{$ub->nombre_finca}}</option>
                         @endforeach    
                        </select>
                  </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                        <label for="nombre">Nombre Producto Agricola</label>
                        <select name="id_producto" class="form-control">
                         @foreach ($productos as $pro) 
                              <option name='id_producto' value="{{$pro->id_producto}}">{{$pro->nombre_producto}}</option>
                         @endforeach    
                        </select>
                  </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  	<label for="nombre">Cantidad Canastillas</label>
                  	<input type="text" name="cantidad" class="form-control" placeholder="Cantidad..."  onkeypress="return validar(event)">
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