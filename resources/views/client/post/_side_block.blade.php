<aside  class="side-bar sticky-top">
    <div class="widget">
        <h6 class="widget-title">Search</h6>
        <div class="search-bx style-1">
            <form role="search" action="{{route('search_posts')}}" id="form_search_posts" method="GET">
                <div class="input-group">
                    <input name="dzName"  class="form-control"  placeholder="Enter your keywords..." type="search">
                    <span class="input-group-btn">
                        <button type="submit" class="fa fa-search text-primary"></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="widget widget_archive">
        <h5 class="widget-title style-1">Todas las categorías</h5>
        <ul>
            @foreach ($web_categories as $web_category)
            <li class="{!! active_class(route('by_category', $web_category)) !!}"><a href="{{route('by_category', $web_category)}}">{{$web_category->title}}</a></li>
            @endforeach
            {{--  <li class="active"><a href="#">General</a></li>
            <li><a href="#">IT & Software</a></li>
            <li><a href="#">Photography</a></li>
            <li><a href="#">Programming Language</a></li>
            <li><a href="#">Technology</a></li>  --}}
        </ul>
    </div>
    <div class="widget recent-posts-entry">
        <h6 class="widget-title">Recent Posts</h6>
        <div class="widget-post-bx">
            @foreach ($web_posts as $post)
            <div class="widget-post clearfix">
                <div class="ttr-post-media"> <img src="{{$post->image->url}}" width="200" height="143" alt=""> </div>
                <div class="ttr-post-info">
                    <div class="ttr-post-header">
                        <h6 class="post-title"><a href="{{route('post_show', $post)}}">{{$post->title}}</a></h6>
                    </div>
                    <ul class="media-post">
                        <li><a href="{{route('post_show', $post)}}"><i class="fa fa-history"></i></i>{{$post->created_at->diffForHumans()}}</a></li>
                        {{--  <li><a href="#"><i class="fa fa-comments-o"></i>15 Comment</a></li>  --}}
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    {{--  web_tags  --}}
    <div class="widget widget_tag_cloud">
        <h6 class="widget-title">Tags</h6>
        <div class="tagcloud">
            @foreach ($web_tags as $web_tag)
            <a href="{{route('by_tag', $web_tag->slug)}}">{{$web_tag->name}}</a>
            @endforeach
        </div>
    </div>

</aside>

{{--  @push('scripts')
<script>
    $(function(){
        var posts = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: "{{route('posts.json')}}"
      });
    
      $('#search_posts').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'posts',
        source: posts
      }).on('typeahead:selected', function(event, selection) {
        $('#form_search_posts').submit();
      });
});
</script>
@endpush  --}}