@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled m-1" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link custom-page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item m-1">
                    <a class="page-link custom-page-link text-color" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled m-1" aria-disabled="true"><span class="page-link custom-page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active m-1" aria-current="page"><span class="page-link color ">{{ $page }}</span></li>
                        @else
                            <li class="page-item m-1"><a class="page-link custom-page-link text-color " href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item m-1">
                    <a class="page-link custom-page-link text-color" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled m-1" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link custom-page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
