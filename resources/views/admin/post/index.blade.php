@extends('layouts.admin')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Mis enlaces</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Inicio</a></li>
                <li>Mis enlaces</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Enlaces</h4>
                    </div>
                    <div class="widget-inner">
                        @foreach ($posts as $item)
                        <div class="card-courses-list bookmarks-bx">
                            <div class="card-courses-media">
                                <img src="{{$item->image->url}}" alt=""/>
                            </div>
                            <div class="card-courses-full-dec">
                                <div class="card-courses-title">
                                    <h4 class="m-b5">{{$item->title}}</h4>
                                </div>
                                <div class="card-courses-list-bx">
                                    <ul class="card-courses-view">
                                        <li class="card-courses-categories">
                                            <h5>Categoría</h5>
                                            <h4>{{$item->category->title}}</h4>
                                        </li>
                                        {{--  <li class="card-courses-review">
                                            <h5>3 Review</h5>
                                            <ul class="cours-star">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </li>  --}}
                                        <li class="card-courses-review">
                                            <h5>Fecha de caducidad</h5>
                                            <h5 class="text-primary m-b0">{{$item->deadline->format('Y-m-d h:i a')}}</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row card-courses-dec">
                                    <div class="col-md-12">
                                        <p>{{$item->meta_description}}</p>	
                                    </div>
                                    <div class="col-md-12">

                                        <form method="POST" action="{{route('posts.destroy', $item)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                        <a href="{{route('posts.edit', $item)}}" class="btn radius-xl">Editar</a>
                                        
                                        <button type="submit" class="btn red outline radius-xl ">Eliminar</button>

                                        <a target="_blank" href="{{route('post_show', $item)}}" class="btn green outline radius-xl">Ver publicación</a>

                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{$posts->render()}}

                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
@endsection