@extends('layouts.client')
@section('content')

@include('client.post._breadcrumb')

<!-- inner page banner -->
{{--  <div class="page-banner ovbl-dark" style="background-image:url({{asset('assets/images/banner/banner3.jpg')}});">
    <div class="container">
        <div class="page-banner-entry">
            <h1 class="text-white">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($loop->last)
                        {{$breadcrumb['text']}}
                    @endif
                @endforeach
            </h1>
         </div>
    </div>
</div>  --}}
<!-- Breadcrumb row -->
{{--  <div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            @foreach ($breadcrumbs as $breadcrumb)
            <li>
                <a 
                @if (!$loop->last)
                href="{{$breadcrumb['url']}}"
                @endif
                >
                    {{$breadcrumb['text']}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>  --}}
<!-- Breadcrumb row END -->
<!-- inner page banner END -->
<div class="content-block">
    <!-- About Us -->
    <div class="section-area section-sp1">
        <div class="container">

            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-xl-8">
                    <div class="row">
                        
                        @foreach ($posts as $post)
                        @include('client.post._item', [
                            'class' => 'col-md-6 col-lg-4 col-sm-6 m-b30'
                        ])
                        @endforeach

                        <div class="col-lg-12 m-b20">
                            {{$posts->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
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