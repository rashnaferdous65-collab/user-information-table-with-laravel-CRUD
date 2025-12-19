@if ($paginator->hasPages())
    <nav class="d-flex justify-content-between align-items-center">
        
        {{-- Mobile View --}}
        <ul class="pagination d-flex d-sm-none mb-0">
            {{-- Previous --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() ?? '#' }}" rel="prev">
                    @lang('pagination.previous')
                </a>
            </li>

            {{-- Next --}}
            <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() ?? '#' }}" rel="next">
                    @lang('pagination.next')
                </a>
            </li>
        </ul>

        {{-- Desktop View --}}
        <div class="d-none d-sm-flex justify-content-between flex-fill align-items-center">
            
            {{-- Showing Info --}}
            <p class="small text-muted mb-0">
                {!! __('Showing') !!} 
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span> 
                {!! __('to') !!} 
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span> 
                {!! __('of') !!} 
                <span class="fw-semibold">{{ $paginator->total() }}</span> 
                {!! __('results') !!}
            </p>

            {{-- Pagination Links --}}
            <ul class="pagination mb-0">
                {{-- Previous --}}
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() ?? '#' }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>

                {{-- Page Numbers --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $page == $paginator->currentPage() ? '#' : $url }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() ?? '#' }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            </ul>
        </div>
    </nav>
@endif


