@if($paginator->hasPages())
<nav>
    <ul class="pagination">

        {{-- Previous --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            @if($paginator->onFirstPage())
                <span class="page-link">&lsaquo;</span>
            @else
                <a class="page-link"
                   href="{{ $paginator->previousPageUrl() }}"
                   rel="prev"
                   aria-label="@lang('pagination.previous')">
                    &lsaquo;
                </a>
            @endif
        </li>

        {{-- Pages --}}
        @foreach($elements as $item)

            {{-- Dots --}}
            @if(is_string($item))
                <li class="page-item disabled">
                    <span class="page-link">{{ $item }}</span>
                </li>
            @endif

            {{-- Page Numbers --}}
            @if(is_array($item))
                @foreach($item as $number => $link)
                    <li class="page-item {{ $number === $paginator->currentPage() ? 'active' : '' }}">
                        @if($number === $paginator->currentPage())
                            <span class="page-link">{{ $number }}</span>
                        @else
                            <a class="page-link" href="{{ $link }}">{{ $number }}</a>
                        @endif
                    </li>
                @endforeach
            @endif

        @endforeach

        {{-- Next --}}
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            @if($paginator->hasMorePages())
                <a class="page-link"
                   href="{{ $paginator->nextPageUrl() }}"
                   rel="next"
                   aria-label="@lang('pagination.next')">
                    &rsaquo;
                </a>
            @else
                <span class="page-link">&rsaquo;</span>
            @endif
        </li>

    </ul>
</nav>
@endif

