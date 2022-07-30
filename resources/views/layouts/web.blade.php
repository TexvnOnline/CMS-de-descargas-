<!DOCTYPE html>
<html class="ie ie7 no-js" lang="en-US">
<html class="ie ie8 no-js" lang="en-US">
<html lang="en" class="no-js">
<head>
	

	<title>
		@yield('title')
	</title>


	<meta charset="UTF-8">
	
	<!--Google Font-->
    {!! Html::style('http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600') !!}


	{!! Html::style('review/css/tags.css') !!}
	<!-- CSS files -->
	{!! Html::style('review/css/plugins.css') !!}
	{!! Html::style('review/css/style.css') !!}

</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="{!!asset('review/images/logo1.png')!!}" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="{{route('web.index')}}"><img class="logo" src="{!!asset('review/images/logo1.png')!!}" alt="" width="119" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="dropdown first">
							<a href="{{route('web.index')}}" class="btn btn-default" >
							Inicio
							</a>
						</li>
						<li class="dropdown first">
							<a href="{{route('web.all')}}" class="btn btn-default" >
							Ver todo
							</a>
						</li>
						@foreach ($categories as $category)
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
								{{$category->name}}<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">		
								@foreach ($category->subcategories as $subcategory)
								<li><a href="{{ route('web.subcategories',['category'=>$category->slug,'subcategory'=>$subcategory->slug])}}">{{$subcategory->name}}</a></li>
								@endforeach
							</ul>
						</li>
						@endforeach
					</ul>
					@if (!is_null($donation))
					<ul class="nav navbar-nav flex-child-menu menu-right">
						<li class="btn"><a href="{{$donation->url}}">donación</a></li>
					</ul>
					@endif
					
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
		<!-- top search form -->
		{!! Form::open(['route'=> 'web.search','method'=> 'GET']) !!}
	    <div class="top-search">
		{!! Form::text('search', null, ['placeholder'=>'Todo lo que necesitas en un solo lugar.']) !!}
		</div>
		{!! Form::close() !!}
	</div>
</header>
@yield('content')
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			
			<div class="flex-child-ft item5">
				<h4>Boletin informativo</h4>
				<p>Mantente informado de los nuevos archivos agregados.</p>
				{!! Form::open(['route'=>'subscribe.store','method'=>'POST']) !!}
				{!! Form::text('email', null, ['placeholder'=>'Introduce tu correo electrónico...']) !!}
				<button type="submit">Suscríbase ahora<i class="ion-ios-arrow-forward"></i></button>
				{!! Form::close() !!}
			</div>

		</div>
	</div>
	<div class="ft-copyright">
		<div class="ft-left">
			<p><a target="_blank" href="http://www.lanube.cu.ma">Realizado por</a></p>
		</div>
		<div class="backtotop">
			<p><a href="#" id="back-to-top">Volver arriba  <i class="ion-ios-arrow-thin-up"></i></a></p>
		</div>
	</div>
</footer>
<!-- end of footer section-->
{!! Html::script('review/js/jquery.js') !!}
{!! Html::script('review/js/plugins.js') !!}
{!! Html::script('review/js/plugins2.js') !!}
{!! Html::script('review/js/custom.js') !!}
</body>

</html>