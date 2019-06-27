@if ($paginator->hasPages())
    <div class="pagination pagination-inverse" style="width: 100%;">
        @if ($paginator->onFirstPage())
            <a class="btn btn-inverse previous disabled" href="#">OLDER</a>
        @else
            <a class="btn btn-inverse previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">OLDER</a>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
            <li class="disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            <ul role="navigation">
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        @endforeach

        @if ($paginator->hasMorePages())
                <a class="btn btn-inverse next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">NEWER</a>
        @else
                <a class="btn btn-inverse next disabled" href="#">NEWER</a>

        @endif
    </div>
@endif
