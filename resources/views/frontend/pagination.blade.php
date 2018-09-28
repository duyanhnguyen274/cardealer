@if ($paginator->hasPages())
    <span class="pages"></span>
    
        @if ($paginator->onFirstPage())
            <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" href="{{ $paginator->previousPageUrl() }}"></a>
        @else
            <a class="prevpostslink" href="{{ $paginator->previousPageUrl() }}"></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="disabled" aria-disabled="true"><span>{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active" aria-current="page"><span>{{ $page }}</span></span>
                    @else
                        <span><a href="{{ $url }}">{{ $page }}</a></span>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="nextpostslink" href="{{ $paginator->nextPageUrl() }}"></a>
        @else
            <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')" href="{{ $paginator->nextPageUrl() }}"></a>
        @endif
    </ul>
@endif
