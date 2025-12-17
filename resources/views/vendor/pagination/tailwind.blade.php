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

        {{-- Pagination Controls --}}
        <span class="inline-flex shadow-sm rounded-md rtl:flex-row-reverse items-center">

            {{-- First Page --}}
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->url(1) }}" class="px-2 py-2 border border-gray-300 bg-white text-white rounded-l-md hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-900">
                    &laquo;
                </a>
            @else
                <span class="px-2 py-2 border border-gray-300 bg-white text-gray-300 rounded-l-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-600">&laquo;</span>
            @endif

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-2 py-2 border border-gray-300 bg-white text-gray-300 cursor-not-allowed dark:bg-gray-700 dark:text-gray-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="px-2 py-2 border border-gray-300 bg-white text-white hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @endif

            {{-- Page Links --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-4 py-2 border border-gray-300 bg-white text-white cursor-default dark:bg-gray-800 dark:text-white">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 border border-gray-300 bg-gray-200 text-gray-700 cursor-default dark:bg-gray-700 dark:text-gray-300">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 border border-gray-300 bg-white text-white hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-900">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="px-2 py-2 border border-gray-300 bg-white text-white hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @else
                <span class="px-2 py-2 border border-gray-300 bg-white text-gray-300 cursor-not-allowed dark:bg-gray-700 dark:text-gray-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            @endif

            {{-- Last Page --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->url($paginator->lastPage()) }}" class="px-2 py-2 border border-gray-300 bg-white text-white rounded-r-md hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-900">
                    &raquo;
                </a>
            @else
                <span class="px-2 py-2 border border-gray-300 bg-white text-gray-300 rounded-r-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-600">&raquo;</span>
            @endif
        </span>

        {{-- Jump to Page Dropdown --}}
        <div class="ml-4">
            <form method="GET" action="{{ url()->current() }}">
                <select name="page" onchange="this.form.submit()" class="border border-gray-300 rounded-md text-sm text-gray-700 dark:text-gray-300">
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <option value="{{ $i }}" @if($i == $paginator->currentPage()) selected @endif>
                            {{ __('Page :i', ['i' => $i]) }}
                        </option>
                    @endfor
                </select>
            </form>
        </div>

        {{-- Items per page selector --}}
        <div class="ml-4">
            <form method="GET" action="{{ url()->current() }}">
                <select name="per_page" onchange="this.form.submit()" class="border border-gray-300 rounded-md text-sm text-gray-700 dark:text-gray-300">
                    @foreach([10, 25, 50, 100] as $count)
                        <option value="{{ $count }}" @if(request('per_page') == $count) selected @endif>
                            {{ $count }} per page
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

    </div>
</nav>
@endif

