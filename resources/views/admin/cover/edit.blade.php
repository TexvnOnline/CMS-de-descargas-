@extends('layouts.admin')
@section('title','Editar portada')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('covers.index')}}">Portada</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Edición de portada</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
    </div>
    {!! Form::model($cover, ['route'=>['covers.update',$cover->id],'method'=>'PUT','files' => true]) !!}
	<div class="card-body ">
		@include('admin.cover.form.form')
		<div class="from-group">
			<div class="text-center">
				<h3>Imagen de publicidad</h3>
				<img src="{!!asset($cover->imagepublicidad)!!}" class="rounded" alt="" width="250">
			</div>
		</div>
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('covers.index')}}">Cancelar</a>
      <input type="submit" value="Actualizar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection