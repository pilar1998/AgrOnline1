@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto del Lugar: {{ $ubicacion_producto->id_ubicacion_producto}}</h3>
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
		</dir>
	</dir>
			{!!Form::model($ubicacion_producto,['method'=>'PATCH','route'=>['ProductoUbicacion.update',$ubicacion_producto->id_ubicacion_producto]])!!}
            {{Form::token()}}
                  
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  	<label for="nombre">Nombre Finca</label>
                  	<select name="id_ubicacion" class="form-control">
                         @foreach ($ubicacion as $ub) 
                         	@if ($ub->id_ubicacion==$ubicacion_producto->id_ubcacion)
                              <option name='id_ubicacion' value="{{$ub->id_ubicacion}}" selected>{{$ub->nombre_finca}}</option>
                             @else                          
                         	<option name='id_ubicacion' value="{{$ub->id_ubicacion}}">{{$ub->nombre_finca}}</option>  
                         	@endif
                         @endforeach 
                        </select>
                  </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                        <label for="nombre">Nombre Producto Agricola</label>
                        <select name="id_producto" class="form-control">
                         @foreach ($productos as $pro) 
                         	@if ($pro->id_producto==$ubicacion_producto->id_producto)
                              <option name='id_producto' value="{{$pro->id_producto}}" selected>{{$pro->nombre_producto}}</option>
                            @else
                            	<option name='id_producto' value="{{$pro->id_producto}}">{{$pro->nombre_producto}}</option>
                            @endif
                         @endforeach    
                        </select>
                  </div>
            </div>
            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                  	<label for="nombre">Cantidad Canastillas</label>
                  	<input type="text" name="cantidad" class="form-control" placeholder="Cantidad..."  onkeypress="return validar(event)" value="{{$ubicacion_producto->cantidad}}">
                  </div>
            </div>
            <div class="form-group">
                  <button class="btn btn-success" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

			{!!Form::close()!!}		
            
@endsection