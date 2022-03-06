@extends('layouts.client')

@section('meta_description', $meta['meta_description'])
@section('meta_og_title', $meta['meta_og_title'])
@section('meta_og_description', $meta['meta_og_description'])
@section('title', $meta['title'])
@section('meta_keyword', $meta['meta_keyword'])

@section('content')
<!-- Main Slider -->
<div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(assets/images/background/bg1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-white">
                    <h2>Find links</h2>
                    {{--  <h5>Own Your Feature Learning New Skills Online</h5>  --}}
                    <form class="cours-search" action="{{route('search_posts')}}" id="" method="GET">
                        <div class="input-group">
                            <input type="text" name="dzName" id="" class="form-control" placeholder="what to look for today?">
                            <div class="input-group-append">
                                <button class="btn" type="submit">Search</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Main Slider -->
<div class="content-block">
    <!-- Popular Courses -->
    <div class="section-area section-sp2 popular-courses-bx">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx left">
                    {{--  <h2 class="title-head">Popular <span>Courses</span></h2>  --}}

                    <h2 class="title-head">popular links</h2>

                    {{--  <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>  --}}
                </div>
            </div>
            <div class="row">
            <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                @foreach ($posts as $post)
                    @include('client.post._item', [
                        'class' => 'item'
                    ])
                @endforeach
            </div>
            </div>
        </div>
    </div>
    <!-- Popular Courses END -->
</div>
<!-- contact area END -->
@endsection

{{--  @push('scripts')
<script>
    $(function(){
        var posts = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `states` is an array of state names defined in "The Basics"
        prefetch: "{{route('posts.json')}}"

      });
      
      $('#search_index_posts').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'posts',
        source: posts
      }).on('typeahead:selected', function(event, selection) {
        $('#form_search_index_posts').submit();
      });
});
</script>
@endpush  --}}