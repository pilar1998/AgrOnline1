<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" id="modal-delete-{{$ad->id_admin}}">
	{{form::open(array('action'=>array('AdministradorController@destroy',$ad->id_admin),'method'=>'delete'))}}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Administrador</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar Administrador</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-success">Confirmar</button>
				</div>

			</div>
		</div>
	{{form::close()}}
</div>