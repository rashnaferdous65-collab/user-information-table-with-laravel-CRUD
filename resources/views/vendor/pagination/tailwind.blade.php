@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

    {{-- Mobile --}}
    <div class="flex items-center justify-between gap-2 sm:hidden">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-white border border-gray-300 rounded-md cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring transition dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:bg-gray-900">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring transition dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:bg-gray-900">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-white border border-gray-300 rounded-md cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </div>

    {{-- Desktop --}}
    <div class="hidden sm:flex sm:items-center sm:justify-between sm:gap-2">

        {{-- Result Info --}}
        <p class="text-sm text-white dark:text-gray-600">
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
            @else
                {{ $paginator->count() }}
            @endif
            {!! __('of') !!}
            <span class="font-medium">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </p>

        {{-- Pagination Links --}}
        <span class="inline-flex shadow-sm rounded-md rtl:flex-row-reverse">

            {{-- Previous Icon --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-2 py-2 text-white bg-white border border-gray-300 rounded-l-md cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="inline-flex items-center px-2 py-2 text-white bg-white border border-gray-300 rounded-l-md hover:bg-gray-100 focus:outline-none focus:ring transition dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:bg-gray-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-white border border-gray-300 cursor-default dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-white border border-gray-300 hover:bg-gray-100 focus:outline-none focus:ring transition dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:bg-gray-900"
                               aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Icon --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="inline-flex items-center px-2 py-2 -ml-px text-white bg-white border border-gray-300 rounded-r-md hover:bg-gray-100 focus:outline-none focus:ring transition dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:bg-gray-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @else
                <span class="inline-flex items-center px-2 py-2 -ml-px text-white bg-white border border-gray-300 rounded-r-md cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            @endif
        </span>
    </div>
</nav>
@endif

