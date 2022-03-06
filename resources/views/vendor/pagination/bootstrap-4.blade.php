@push('styles')
    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
          }
    </style>
@endpush
@if ($paginator->hasPages())
    <div class="pagination-bx rounded-sm gray clearfix">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="previous" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="#" class="disabled"> <i class="ti-arrow-left"></i> Prev</a>
                    {{--  <span class="page-link" aria-hidden="true">&lsaquo;</span>  --}}
                </li>
            @else
                <li class="previous">
                    {{--  <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>  --}}

                    <a href="{{ $paginator->previousPageUrl() }}"><i class="ti-arrow-left"></i> Prev</a>

                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    {{--  <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>  --}}

                    {{--  <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>  --}}

                    <li aria-disabled="true"><a href="#" class="disabled">{{ $element }}</a></li>

                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{--  <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>  --}}


                            <li class="active" aria-current="page"><a href="#" class="disabled">{{ $page }}</a></li>

                        @else
                            {{--  <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>  --}}

                            <li><a href="{{ $url }}">{{ $page }}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                {{--  <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>  --}}

                <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next <i class="ti-arrow-right"></i></a></li>

            @else
                {{--  <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>  --}}


                <li class="next" aria-disabled="true" aria-label="@lang('pagination.next')"><a href="#" class="disabled">Next <i class="ti-arrow-right"></i></a></li>

            @endif
        </ul>
    </div>
@endif
