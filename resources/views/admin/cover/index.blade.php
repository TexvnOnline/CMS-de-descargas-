@extends('layouts.admin')
@section('title','Gestión de portada')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de portada</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
	</div>
	<div class="card-body table-responsive p-0" style="height: 300px;">
		<a class="m-2 float-right btn btn-primary" href="{{route('covers.create')}}">Crear</a>
		
		<table class="table table-head-fixed">
		  <thead>
			  <tr>
				  <th scope="col">ID</th>
				  <th>Imagen</th>
				  <th>Enlace</th>
				  <th colspan="2">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($covers as $cover)
				<tr>
					<th scope="row">{{$cover->id}}</td>
					<td>{{$cover->imagepublicidad}}</td>
					<td>{{$cover->urlpublicidad}}</td>
					<td width="10px">
						<a class="btn btn-info" href="{{route('covers.edit', $cover->id)}}">Editar</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['covers.destroy',$cover->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger">Eliminar</button>
						{!! Form::close() !!}
					</td>
				</tr>
			  @endforeach	 
		  </tbody>
		</table>
	{{$covers->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>
@endsection