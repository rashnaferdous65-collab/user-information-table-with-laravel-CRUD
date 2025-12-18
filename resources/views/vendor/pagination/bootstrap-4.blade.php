@if($paginator->hasPages())
<nav aria-label="Pagination Navigation">
    <ul class="pagination align-items-center">

        {{-- First --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link"
               href="{{ $paginator->url(1) }}"
               aria-label="First Page">
                &laquo;
            </a>
        </li>

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
                    <li class="page-item {{ $number === $paginator->currentPage() ? 'active' : '' }}"
                        @if($number === $paginator->currentPage()) aria-current="page" @endif>
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

        {{-- Last --}}
        <li class="page-item {{ $paginator->currentPage() === $paginator->lastPage() ? 'disabled' : '' }}">
            <a class="page-link"
               href="{{ $paginator->url($paginator->lastPage()) }}"
               aria-label="Last Page">
                &raquo;
            </a>
        </li>

    </ul>

    {{-- Page Info --}}
    <div class="text-center mt-2 small text-muted">
        Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
    </div>
</nav>
@endif


