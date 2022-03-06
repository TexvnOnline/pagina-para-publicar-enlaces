@extends('layouts.client')
@section('content')
@include('client.post._breadcrumb')
<!-- inner page banner END -->
<div class="content-block">
    <!-- About Us -->
    <div class="section-area section-sp1">
        <div class="container">

            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-xl-8">
                    {{--  <div class="row">  --}}
                        <div class="row choose-bx-in">
                            @foreach ($categories as $category)
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                                <div class="service-bx">
                                    <div class="action-box">
                                        <img src="{{$category->image->url}}" alt="{{$category->title}}">
                                    </div>
                                    <div class="info-bx text-center">
                                        <div class="feature-box-sm radius bg-white">
                                            <i class="fa {{$category->icon}} text-primary"></i>
                                        </div>
                                        <h4><a href="#">{{$category->title}}</a></h4>
                                        <a href="#" class="btn radius-xl">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        
                        {{--  @foreach ($posts as $post)
                        @include('client.post._item', [
                            'class' => 'col-md-6 col-lg-4 col-sm-6 m-b30'
                        ])
                        @endforeach

                        <div class="col-lg-12 m-b20">
                            {{$posts->links('pagination::bootstrap-4')}}
                        </div>  --}}
                    {{--  </div>  --}}
                </div>
                <!-- Left part END -->
                <!-- Side bar start -->
                <div class="col-lg-4 col-xl-4">
                    @include('client.post._side_block')
                </div>
                <!-- Side bar END -->
            </div>
        </div>
    </div>
</div>
<!-- contact area END -->
@endsection