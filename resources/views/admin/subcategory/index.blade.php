@extends('layouts.admin')
@section('title','Gestión de subcategorías')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de subcategorías</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
	</div>
	<div class="card-body table-responsive p-0">
		<a class="m-2 float-right btn btn-primary" href="{{route('subcategories.create')}}">Crear</a>
		<table class="table table-head-fixed">
		  <thead>
			  <tr>
				  <th scope="col">ID</th>
				  <th>Nombre</th>
				  <th colspan="3">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($subcategories as $subcategory)
				<tr>
					<th scope="row">{{$subcategory->id}}</td>
					<td>{{$subcategory->name}}</td>
					<td width="10px">
					<a class="btn btn-default" href="{{route('subcategories.show', $subcategory->id)}}">Articulo</a>
					</td>
					<td width="10px">
						<a class="btn btn-info" href="{{route('subcategories.edit', $subcategory->id)}}">Editar</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['subcategories.destroy',$subcategory->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger">Eliminar</button>
						{!! Form::close() !!}
					</td>
				</tr>
			  @endforeach	 
		  </tbody>
		</table>
	{{$subcategories->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection