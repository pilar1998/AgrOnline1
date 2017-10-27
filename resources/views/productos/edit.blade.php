@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto Agricola: {{ $productos->id_producto}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($productos,['method'=>'PATCH','route'=>['productos.update',$productos->id_producto]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre_producto">Nombre Producto</label>
            	<input type="text" name="nombre_producto" class="form-control" value="{{$productos->nombre_producto}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<button class="btn btn-success" type="submit">Guardar</button>
            {!!Form::close()!!}	
            	<a href="'productos.index',['productos'=>$productos,'searchText'=>''" ><button class="btn btn-danger" type="reset" type="submit">Cancelar</button></a>

            </div>

				
            
		</div>
	</div>
@endsection