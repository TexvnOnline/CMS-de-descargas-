@extends('layouts.admin')
@section('title','Crear red social')
@section('breadcrumb')
<li class="breadcrumb-item active">
	<a href="{{route('socials.index')}}">Red social</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Registro de red social</h3>
	  <div class="card-tools">
		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		  <i class="fas fa-minus"></i></button>
		<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		  <i class="fas fa-times"></i></button>
	  </div>
    </div>
    {!! Form::open(['route'=>'socials.store', 'method'=>'POST','files' => true]) !!}
	<div class="card-body ">
        @include('admin.social.form.form')
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('socials.index')}}">Cancelar</a>
      <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@endsection