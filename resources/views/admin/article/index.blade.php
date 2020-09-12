@extends('layouts.admin')
@section('title','Gestión de articulo')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de articulo</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
	</div>
	<div class="card-body table-responsive p-0">
		@if (isset($permissions))
		
		@else
		<a class="m-2 float-right btn btn-primary" href="{{route('articles.create')}}">Crear</a>	
		@endif
		<table class="table table-head-fixed">
		  <thead>
			  <tr>
				  <th scope="col">ID</th>
				  <th>Nombre</th>
				  <th>Publicado</th>
				  <th colspan="3">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($articles as $article)
				<tr>
					<th scope="row">{{$article->id}}</td>
					<td>{{$article->name}}</td>

					<td>
						@if ($article->activate == 0)
						No publicado
						@else
						Publicado	
						@endif
					</td>
					<td width="10px">
					<a class="btn btn-default" href="{{route('articles.show', $article->id)}}">Encales</a>
					</td>
					<td width="10px">
						<a class="btn btn-info" href="{{route('articles.edit', $article->id)}}">Editar</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['articles.destroy',$article->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger">Eliminar</button>
						{!! Form::close() !!}
					</td>
				</tr>
			  @endforeach	 
		  </tbody>
		</table>
	{{$articles->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection