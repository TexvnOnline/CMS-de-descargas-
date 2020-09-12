@extends('layouts.admin')
@section('title','Detalles de articulo')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('articles.index')}}">Artículos</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Detalle de articulo</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
    </div>
	<div class="card-body ">
        <p><strong>Nombre: </strong>{{$article->name}} </p>
        <p><strong>Slug: </strong>{{$article->slug}} </p>
		<p><strong>Descripción: </strong>{{$article->description}} </p>
		<div class="from-group">
			<div class="text-center">
				<img src="{!!asset('$article->image')!!}" 
			  </div>
		</div>
	</div>
	<div class="card-footer">
      <a class="btn btn-primary" href="{{route('articles.index')}}">Regresar</a>
    </div>
  </div>
@endsection