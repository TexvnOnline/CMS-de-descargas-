@extends('layouts.admin')
@section('title','Gestión de enlaces')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de enlaces</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
	</div>
	<div class="card-body table-responsive p-0">
		<a class="m-2 float-right btn btn-primary" href="{{route('links.create')}}">Crear</a>
		<table class="table table-head-fixed">
		  <thead>
			  <tr>
				  <th scope="col">ID</th>
				  <th>Nombre</th>
				  <th>Icono</th>
				  <th>Color</th>
				  <th colspan="2">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($links as $link)
				<tr>
					<th scope="row">{{$link->id}}</td>
					<td>{{$link->name}}</td>
					<td>{{$link->icon}}</td>
					<td>{{$link->color}}</td>
					<td width="10px">
						<a class="btn btn-info" href="{{route('links.edit', $link->id)}}">Editar</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['links.destroy',$link->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger">Eliminar</button>
						{!! Form::close() !!}
					</td>
				</tr>
			  @endforeach	 
		  </tbody>
		</table>
	{{$links->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection