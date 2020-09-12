

<div class="modal fade" id="modal-edit-donation{{$donation->id}}">
	<div class="modal-dialog modal-edit-donation">
	  <div class="modal-content">
		<div class="modal-header">
		  <h4 class="modal-title">Edición de enlace de donación</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		{!! Form::model($donation, ['route'=>['donations.update',$donation->id],'method'=>'PUT']) !!}
		<div class="modal-body">
			<div class="card-body ">
				@include('admin.donation.form.form')
			</div>
		</div>
		<div class="modal-footer justify-content-between">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <input type="submit" value="Actualizar" class="btn btn-primary">
		</div>
		{!! Form::close() !!}
	  </div>
	</div>
</div>