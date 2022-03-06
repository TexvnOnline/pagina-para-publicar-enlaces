@extends('layouts.client')
@section('meta_description', $meta['meta_description'])
@section('meta_og_title', $meta['meta_og_title'])
@section('meta_og_description', $meta['meta_og_description'])
@section('title', $meta['title'])
@section('meta_keyword', $meta['meta_keyword'])
@section('content')
@include('client.post._breadcrumb')
<!-- inner page banner END -->
<div class="content-block">
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-xl-8">
                    <!-- blog start -->
                    <div class="recent-news blog-lg">
                        <div class="action-box blog-lg">
                            <img src="{{$post->image->url}}" alt="{{$post->title}}">
                        </div>
                        <div class="info-bx">
                            <ul class="media-post">
                                <li><a href="{{route('post_show', $post)}}"><i class="fa fa-history"></i>{{$post->created_at->format('Y-m-d')}}</a></li>

                                <li><a href="{{route('by_category', $post->category)}}"><i class="fa fa-tag"></i>{{$post->category->title}}</a></li>
                            </ul>
                            <h5 class="post-title"><a href="#">{{$post->title}}</a></h5>
                            <p>{{$post->meta_description}}</p>

                            {!! $post->description !!}

                            <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>

                            <div class="widget_tag_cloud">
                                <h6>TAGS</h6>
                                <div class="tagcloud"> 
                                    @foreach ($post->tags as $tag)
                                    <a href="{{route('by_tag', $tag->slug)}}">{{$tag->name}}</a> 
                                    @endforeach
                                </div>
                            </div>

                            <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                                {{--  <h6>SHARE </h6>
                                <ul class="list-inline contact-social-bx">
                                    <li><a href="#" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="btn outline radius-xl"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#" class="btn outline radius-xl"><i class="fa fa-google-plus"></i></a></li>
                                </ul>  --}}

                            <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>

                            <div class="cours-bx mt-3 mb-3">
                                <div class="cours-more-info">
                                    <div class="review">
                                        <span>IR A ENLACE</span>
                                        <h5 class="text-center">
                                            <a href="{{url($post->link)}}" target="_blank" class="btn btn-primary btn-lg">Ir al enlace</a>
                                        </h5>
                                    </div>
                                    <div class="price">
                                        <span>FECHA LÍMITE DE ENLACE</span>
                                        <h5 class="text-center mt-2" id="demo"></h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                        </div>
                    </div>
                    <div class="clear" id="comment-list">
                        <div class="comments-area" id="comments">
                            <h2 class="comments-title">Comments</h2>
                            <div class="clearfix m-b20">
                                <div id="disqus_thread"></div>
                                @include('client.post._disqus_thread')
                            </div>
                        </div>
                    </div>
                    <!-- blog END -->
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
@push('scripts')
<script id="dsq-count-scr" src="//linksof.disqus.com/count.js" async></script>
<script>
    var countDownDate = new Date('<?php echo $post->deadline ?>').getTime();

    console.log(countDownDate);

    var x = setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
</script>
@endpush