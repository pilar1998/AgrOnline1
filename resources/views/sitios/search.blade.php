{!! Form::open(array('url'=>'sitios','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="form-group">
	<div class="input-group ">
		<input type="int" name="searchText"  value="{{$searchText}}" placeholder="Buscar..." >
		<span class="btn">
			<button type="submit" class="btn btn-success"><span class="fa fa-search"></span>Buscar</button>
		</span>
	</div>
</div>

{{Form::close()}}