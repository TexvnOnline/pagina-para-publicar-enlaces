@extends('layouts.admin')
@section('content')
<main class="ttr-wrapper">

    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Mantenimiento de publicaciones</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Inicio</a></li>
                <li><a href="{{route('posts.index')}}"><i class="fa fa-home"></i>Enlaces</a></li>
                <li>Mantenimiento de publicaciones</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Mantenimiento de publicaciones</h4>
                    </div>
                    <div class="widget-inner">
                        {{--  <form class="edit-profile m-b30" method="POST" action="{{route('categories.store')}}">
                            @csrf  --}}
                        {!! Form::open(['route'=>'posts.store', 'method'=>'POST', 'files' => true, 'class' => 'edit-profile m-b30']) !!}

                            @include('admin.post._form',[
                                'post' => new \App\Models\Post(),
                                'tags' => ''
                            ])
                        
                        {!! Form::close() !!}
                        {{--  </form>  --}}
                    </div>
                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
@endsection