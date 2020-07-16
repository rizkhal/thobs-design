@if ($paginator->hasPages())
    <nav style="margin-top: 3em!important;">
        <ul class="pagination-custom">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-control">
                    <a href="javascript:void(0)">&lsaquo;</a>
                </li>
            @else
                <li class="pagination-control">
                    <a href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-control">
                        <a href="javascript:void(0)">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-control active">
                                <a href="javascript:void(0)">{{ $page }}</a>
                            </li>
                        @else
                            <li class="pagination-control">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-control">
                    <a href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
                </li>
            @else
                <li class="pagination-control">
                    <a href="javascript:void(0)">&rsaquo;</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
