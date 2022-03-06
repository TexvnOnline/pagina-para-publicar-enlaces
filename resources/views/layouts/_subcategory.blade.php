@foreach ($collection->subcategories as $item)
<li>
    @if ($item->has_subcategory())
    <a href="javascript:;">{{$item->title}}<i class="fa fa-angle-right"></i></a>
    <ul class="sub-menu">
        @include('layouts._subcategory',[
            'collection' => $item
        ])
    </ul>
    @else
    <a href="{{route('by_category', $item)}}">{{$item->title}}</a>
    @endif
</li>
@endforeach