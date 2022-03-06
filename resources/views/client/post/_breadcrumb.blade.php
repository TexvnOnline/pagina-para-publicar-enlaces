<!-- inner page banner -->
<div class="page-banner ovbl-dark" style="background-image:url({{asset('assets/images/banner/banner3.jpg')}});">
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
</div>
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
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
</div>
<!-- Breadcrumb row END -->