@extends('layouts.web')

@section('content')
<div class="buster-light">
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        @if (isset($categoria))
                        <h1> Descarga todos los {{$categoria->name}} gratis </h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ url()->previous() }}">Regresar</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> {{$categoria->name}}</li>
                        </ul>
                        @elseif (isset($category))
                        <h1> Descarga todos los {{$category->name}} de {{$subcategory->name}} gratis </h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ url()->previous() }}">Regresar</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> {{$category->name}}</li>
                        </ul>
                        @elseif (isset($etiqueta))
                        <h1> Descarga todos los {{$etiqueta->name}} gratis </h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ url()->previous() }}">Regresar</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> {{$etiqueta->name}}</li>
                        </ul>
                        @elseif (isset($word))
                        <h1>Resultados de búsqueda - {{$word}}</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ url()->previous() }}">Regresar</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>resultados</li>
                        </ul>
                        @elseif (isset($popular))
                        <h1>Descarga los archivos mas {{$popular}}</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ url()->previous() }}">Regresar</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>{{$popular}}</li>
                        </ul>
                        @else
                        <h1> Descarga todos los archivos gratis </h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ url()->previous() }}">Regresar</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> Todos los archivos</li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-8 col-sm-12 col-xs-12">

                    {!! Form::open(['route'=> 'web.search','method'=> 'GET']) !!}
                    <div class="sidebar">
                        <div class="sb-search sb-it">
                            <input type="text" id="search" placeholder="Buscar">
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <div class="flex-wrap-movielist">
                        @foreach ($articles as $article)
                        <div class="movie-item-style-2 movie-item-style-1">
                            <img src="{!!asset($article->image)!!}" alt="">
                            <div class="hvr-inner">
                                <a  href="{{route('web.single',$article->slug)}}"> Ir a descarga <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="mv-item-infor">
                                <h6><a href="{{route('web.single',$article->slug)}}">{{$article->name}}</a></h6>
                                <p class="rate"><i class="ion-android-download"></i><span>{{$article->visits}}</span></p>
                            </div>
                        </div>	
                        @endforeach
                    </div>		
                    <div class="pagination">
                        {{$articles->render()}}
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
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

            </div>

            
@endsection