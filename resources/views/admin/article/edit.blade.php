@extends('layouts.admin')
@section('title','Editar articulo')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('articles.index')}}">Artículos</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Edición de articulo</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
    </div>
    {!! Form::model($article, ['route'=>['articles.update',$article->id],'method'=>'PUT','files' => true]) !!}
	<div class="card-body ">
		@include('admin.article.form.form')
		<div class="from-group">
			{!! Form::label('activate','¿Publicar articulo?') !!}
			{!! Form::checkbox('activate', null) !!}<br>
		</div>
		<div class="from-group">
			<div class="text-center">
				{!! Form::label('image','Imagen de portada') !!} <br>
				<img src="{!!asset($article->image)!!}" class="rounded" alt="" width="250">
			</div>
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('articles.index')}}">Cancelar</a>
      <input type="submit" value="Actualizar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection