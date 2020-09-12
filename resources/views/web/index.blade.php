@extends('layouts.web')
@section('content')
<div class="slider movie-items">
	<div class="container">
		<div class="row">
			<div class="social-link">
				<p>SÍGUENOS: </p>
				@foreach ($socials as $social)
				<a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a>
				@endforeach
			</div>
	    	<div  class="slick-multiItemSlider">
				@foreach ($articles as $article)
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="{{route('web.single',$article->slug)}}">
							<img src="{!!asset($article->image)!!}" alt="" width="285" height="437">
						</a>
	    			</div>
	    			<div class="title-in">
	    				<h6><a href="{{route('web.single',$article->slug)}}">{{$article->name}}</a></h6>
	    				<p><i class="ion-android-download">
							</i>
							<span>{{$article->visits}}</span>
						</p>
	    			</div>
	    		</div>
				@endforeach
	    	</div>
	    </div>
	</div>
</div>
		<div class="buster-light">
<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="title-hd">
					<h2>Agregados recientemente</h2>
					<a href="{{route('web.all')}}" class="viewall">Ver todo <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links">
						<li class="active"><a href="#tab1">Lo ultimo</a></li>                       
					</ul>
				    <div class="tab-content">
				        <div id="tab1" class="tab active">
				            <div class="row">
				            	<div class="slick-multiItem">
									{{--  AGREGAR 8 ARTICULOS  --}}
									@foreach ($articlesRecently as $articlesRecen)
				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="{!!asset($articlesRecen->image)!!}" alt="" width="185" height="284">
					            			</div> 
					            			<div class="hvr-inner">
					            				<a  href="{{route('web.single',$articlesRecen->slug)}}">Descargar<i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="{{route('web.single',$articlesRecen->slug)}}">{{$articlesRecen->name}}</a></h6>
					            				<p><i class="ion-android-download"></i><span>{{$articlesRecen->visits}}</span></p>
					            			</div>
					            		</div>
				            		</div>
									@endforeach
				            	</div>
				            </div>
				        </div>
				    </div>
				</div>
				<div class="title-hd">
					<h2>Los más descargados</h2>
					<a href="{{route('web.popular')}}" class="viewall">Populares <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links-2">
						<li class="active"><a href="#tab21">Más populares</a></li> 
					</ul>
				    <div class="tab-content">
				        <div id="tab21" class="tab active">
				            <div class="row">
				            	<div class="slick-multiItem">
									@foreach ($articulosdescargados as $article)
									<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="{!!asset($article->image)!!}" alt="" width="185" height="284">
					            			</div> 
					            			<div class="hvr-inner">
					            				<a  href="{{route('web.single',$article->slug)}}">Descargar<i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="{{route('web.single',$article->slug)}}">{{$article->name}}</a></h6>
					            				<p><i class="ion-android-download"></i><span>{{$article->visits}}</span></p>
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
			<div class="col-md-4">
				<div class="sidebar">
					@include('web.template.searh')
                    @include('web.template.categories')
					@include('web.template.tags')
					<div class="ads">
						<a href="{{$cover2->urlpublicidad}}">
							<img src="{!!asset($cover2->imagepublicidad)!!}" alt="">
						</a> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- latest new v1 section-->
<div class="latestnew">
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
</div>
<!--end of latest new v1 section-->
		</div>
<!-- footer section-->
@endsection