@if ($paginator->hasPages())
    <div class="pagination">
        <ul class="pagination_list">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <li class="first-a">
                    <a href="{{ $paginator->previousPageUrl() }}"></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <a>{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active">
                                <a>{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="last-a">
                    <a href="{{ $paginator->nextPageUrl() }}"></a>
                </li>
            @endif
        </ul>
    </div>
@endif
