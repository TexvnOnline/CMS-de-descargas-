@extends('layouts.admin')
@section('title','Editar subcategoría')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('subcategories.index')}}">Subcategorías</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Edición de subcategoría</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
    </div>
    {!! Form::model($subcategory, ['route'=>['subcategories.update',$subcategory->id],'method'=>'PUT','files' => true]) !!}
	<div class="card-body ">
		@include('admin.subcategory.form.form')
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('subcategories.index')}}">Cancelar</a>
      <input type="submit" value="Actualizar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection