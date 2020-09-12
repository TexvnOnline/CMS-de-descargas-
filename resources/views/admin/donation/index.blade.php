@extends('layouts.admin')
@section('title','Gestión de donación ')
@section('breadcrumb')
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Sección de donación </h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
	</div>
	<div class="card-body table-responsive p-0">

		<a href="{{route('donations.create')}}"   data-toggle="modal" data-target="#modal-create-donation" >
            <button type="button" class="m-2 float-right btn btn-primary">Agregar</button>
        </a>

		<table class="table table-head-fixed">
		  <thead>
			  <tr>
				  <th scope="col">ID</th>
				  <th>Nombre</th>
				  <th colspan="2">&nbsp;</th>
			  </tr>
		  </thead>
		  <tbody>
			  @foreach ($donations as $donation)
				<tr>
					<th scope="row">{{$donation->id}}</td>
					<td>{{$donation->url}}</td>
					<td width="10px">
						<a class="btn btn-info" href="{{route('donations.edit', $donation->id)}}"  data-toggle="modal" data-target="#modal-edit-donation{{$donation->id}}">Editar</a>
					</td>
					<td width="10px">
						{!! Form::open(['route'=>['donations.destroy',$donation->id], 'method'=>'DELETE']) !!}
						<button class="btn btn-danger">Eliminar</button>
						{!! Form::close() !!}
					</td>
                </tr>
                @include('admin.donation.edit')
               
			  @endforeach	 
		  </tbody>
		</table>
	{{$donations->render()}}
	</div>
	<div class="card-footer">
	  Footer
	</div>
  </div>

  @include('admin.donation.create')

@endsection