@extends('layouts.admin')
@section('title','Gestión de red social')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de red social</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
	</div>
	<div class="card-body table-responsive p-0" style="height: 300px;">
		<a class="m-2 float-right btn btn-primary" href="{{route('socials.create')}}">Crear</a>
		
		<table class="table table-head-fixed">
		  <thead>
			  <tr>
				  <th scope="col">ID</th>
				  <th>Icono</th>
				  <th>Enlace</th>
				  <th colspan="2">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($socials as $social)
				<tr>
					<th scope="row">{{$social->id}}</td>
					<td>{{$social->icon}}</td>
					<td>{{$social->url}}</td>
					<td width="10px">
						<a class="btn btn-info" href="{{route('socials.edit', $social->id)}}">Editar</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['socials.destroy',$social->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger">Eliminar</button>
						{!! Form::close() !!}
					</td>
				</tr>
			  @endforeach	 
		  </tbody>
		</table>
	{{$socials->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection