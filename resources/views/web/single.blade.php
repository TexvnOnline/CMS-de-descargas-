@extends('layouts.web')
@section('title',"{$article->title}")
@section('content')
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Descarga {{$article->name}} Gratis 2020</h1>
					<ul class="breadcumb">
						<li class="active"><a href="{{ url()->previous() }}">Regresar</a></li>
						<li> <span class="ion-ios-arrow-right"></span>{{$article->name}}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
		<div class="buster-light">
<!-- blog detail section-->
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="blog-detail-ct">
					<h1>Descarga {{$article->name}} Gratis 2020</h1>
					{{--  <span class="time">27 Mar 2017</span>  --}}
					<div class="img-container">
						<img src="{!!asset($article->image)!!}" alt="">
					</div>

                    <div class="movie-tabs">
                        <div class="  tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">información</a></li>
                                <li><a href="#reviews">contenido</a></li>
                                <li><a href="#cast">requisitos </a></li>
                                <li><a href="#media">instrucciones</a></li> 
                                <li><a href="#moviesrelated">Enlaces</a></li>                        
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
										<div class="margen-derecha margen-izquierda">
											{!!$article->descriptionH!!}
										</div>
                                        
                                    </div>
                                </div>
                                <div id="reviews" class="tab">
                                   <div class="row">
                                        {!!$article->Content!!}
                                    </div>
                                </div>
                                <div id="cast" class="tab">
                                    <div class="row">
                                        {!!$article->Requirements!!}
                                    </div>
                                </div> 
                                <div id="media" class="tab">
                                    <div class="row">
                                        {!!$article->Instructions!!}
                                    </div>
                                </div>
                                <div id="moviesrelated" class="tab">
                                    <div class="row">
										
										@foreach ($article->links as $link)
											<a href="{{$link->url}}" class="buttondescarga {{$link->color}}">
												<span class="{{$link->icon}}"></span>{{$link->name}}
											</a>
										@endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="flex-it share-tag">
						<div class="social-link">
							<h4>Síguenos</h4>
							@foreach ($socials as $social)
								<a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a>
							@endforeach
						</div>
						<div class="right-it">
							<h4>Tags</h4>
							@foreach ($article->tags as $tag)
							<a href="{{ route('web.tag',$tag->slug)}}">{{$tag->name}},</a>
							@endforeach
						</div>
                    </div>
                    {{--  METER EL SLIDER  --}}
					<div class="movie-items"> 
						<div class="tabs"> 
							<div class="tab-content">
								<div class="row">
									<div  class="slick-multiItemSlider">
										@foreach ($articulos as $articulo)
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="{!!asset($articulo->image)!!}" alt="" width="185" height="284">
												</div> 
												<div class="hvr-inner">
													<a  href="{{route('web.single',$articulo->slug)}}">Descargar<i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="{{route('web.single',$articulo->slug)}}">{{$articulo->name}}</a></h6>
													<p><i class="ion-android-download"></i><span>{{$articulo->visits}}</span></p>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
                    

				</div>

				{{--  PUBLICIDAD  --}}
				@include('web._latestnew')
				{{--  <div class="latestnew">
					<div class="container">
						<div class="row ipad-width">
							<div class="col-md-8">
								<div class="ads">
									<a href="{{$cover->urlpublicidad}}">
										<img src="{!!asset($cover->imagepublicidad)!!}" alt="" width="728" height="106">
									</a>  
								</div>
							</div>
						</div>
					</div>
				</div>  --}}


			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="sidebar">
					{!! Form::open(['route'=> 'web.search','method'=> 'GET']) !!}
                        <div class="sb-search sb-it">
							<h4 class="sb-title">Buscar</h4>
                            <input type="text" id="search" placeholder="Buscar">
                        </div>
                    {!! Form::close() !!}
					<div class="sb-cate sb-it">
						<h4 class="sb-title">Subcategorías</h4>
						<ul>
							@foreach ($subcategories as $subcategory)
							<li><a href="{{route('web.subcategories',['category'=>$categoria->slug,'subcategory'=>$subcategory->slug])}}">{{$subcategory->name}}</a></li>
							@endforeach
						</ul>
					</div>
					@include('web._ads')
					<div class="sb-tags sb-it">
						<h4 class="sb-title">tags</h4>
						<ul class="tag-items">
							@foreach ($article->tags as $tag)
							<li><a href="{{ route('web.tag',$tag->slug)}}">{{$tag->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="ads">
						<img src="images/uploads/ads1.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end of  blog detail section-->
		</div>

@endsection