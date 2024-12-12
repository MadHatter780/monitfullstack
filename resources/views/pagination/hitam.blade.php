<!-- resources/views/components/custom-pagination.blade.php -->

@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
    <div class="flex justify-between flex-1 sm:hidden">
        {{-- Previous Button --}}
        @if ($paginator->onFirstPage())
        <span
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-700 border border-gray-500 cursor-default leading-5 rounded-md">
            Previous
        </span>
        @else
        <a wire:click="previousPage"
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-gray-500 leading-5 rounded-md hover:bg-gray-700 focus:outline-none focus:ring ring-gray-300">
            Previous
        </a>
        @endif

        {{-- Next Button --}}
        @if ($paginator->hasMorePages())
        <a wire:click="nextPage"
            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white bg-gray-800 border border-gray-500 leading-5 rounded-md hover:bg-gray-700 focus:outline-none focus:ring ring-gray-300">
            Next
        </a>
        @else
        <span
            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-gray-700 border border-gray-500 cursor-default leading-5 rounded-md">
            Next
        </span>
        @endif
    </div>

    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
        <div>
            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                {{-- Previous Button --}}
                @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span
                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-gray-700 border border-gray-500 cursor-default rounded-l-md leading-5"
                        aria-hidden="true">&laquo;</span>
                </span>
                @else
                <a wire:click="previousPage"
                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-800 border border-gray-500 rounded-l-md leading-5 hover:bg-gray-700 focus:outline-none focus:ring ring-gray-300"
                    aria-label="@lang('pagination.previous')">&laquo;</a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "..." for gap in pagination --}}
                @if (is_string($element))
                <span aria-disabled="true">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-gray-700 border border-gray-500 cursor-default leading-5">{{
                        $element }}</span>
                </span>
                @endif

                {{-- Links Pages --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-300 bg-gray-900 border border-gray-500 cursor-default leading-5">{{
                        $page }}</span>
                </span>
                @else
                <a wire:click="gotoPage({{ $page }})"
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-gray-800 border border-gray-500 leading-5 hover:bg-gray-700 focus:outline-none focus:ring ring-gray-300"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                </a>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Button --}}
                @if ($paginator->hasMorePages())
                <a wire:click="nextPage"
                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-white bg-gray-800 border border-gray-500 rounded-r-md leading-5 hover:bg-gray-700 focus:outline-none focus:ring ring-gray-300"
                    aria-label="@lang('pagination.next')">&raquo;</a>
                @else
                <span aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span
                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-gray-700 border border-gray-500 cursor-default rounded-r-md leading-5"
                        aria-hidden="true">&raquo;</span>
                </span>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif