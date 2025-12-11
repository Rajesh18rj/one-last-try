@if ($paginator->hasPages())
    <nav class="flex items-center space-x-2">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed text-sm font-medium">
            <i class="fas fa-angle-left"></i>
        </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="px-4 py-2 rounded-full bg-[#F79C23] text-white hover:bg-[#d88410] hover:shadow-md hover:scale-105 transition text-sm font-medium flex items-center gap-1">
                <i class="fas fa-angle-left"></i>
            </a>
        @endif

        {{-- Pagination Numbers --}}
        @foreach ($elements as $element)

            @if (is_string($element))
                <span class="px-4 py-2 text-gray-400 text-sm">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 rounded-full bg-[#F79C23] text-white shadow-md font-bold border border-[#dda464]">
                        {{ $page }}
                    </span>
                    @else
                        <a href="{{ $url }}"
                           class="px-4 py-2 rounded-full bg-white border border-[#F79C23] text-[#F79C23] hover:bg-[#FFE9C2] hover:shadow-sm hover:scale-105 transition font-medium text-sm">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif

        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="px-4 py-2 rounded-full bg-[#F79C23] text-white hover:bg-[#d88410] hover:shadow-md hover:scale-105 transition text-sm font-medium flex items-center gap-1">
                <i class="fas fa-angle-right"></i>
            </a>
        @else
            <span class="px-4 py-2 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed text-sm font-medium">
            <i class="fas fa-angle-right"></i>
        </span>
        @endif

    </nav>
@endif
