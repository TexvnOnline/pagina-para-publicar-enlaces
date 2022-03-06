<div class="{{$class}}">
    <div class="cours-bx">
        <div class="action-box">
            <img src="{{$post->image->url}}" alt="">
            <a href="{{route('post_show', $post)}}" class="btn">Download</a>
        </div>
        <div class="info-bx text-center">
            <h5><a href="{{route('post_show', $post)}}">{{$post->title}}</a></h5>
            {{--  <span>{{$post->category->title}}</span>  --}}
            <span><a href="{{route('by_category', $post->category)}}">{{$post->category->title}}</a></span>
        </div>
        
        <div class="cours-more-info">
            <div class="review">
                <div class="card-courses-user-pic">
                    <img src="{{$post->user->avatary}}" alt=""/>
                </div>
                <div class="card-courses-user-info">
                    <h4>{{$post->user->name}}</h4>
                </div>
            </div>
            <div class="price">
                <span>Publicado</span>
                <h5>{{$post->created_at->diffForHumans()}}</h5>
            </div>
        </div>

    </div>
</div>

@push('styles')
{!! Html::style('admin/assets/css/dashboard.css') !!}
@endpush