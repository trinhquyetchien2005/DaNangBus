@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="pagination">
        <ul class="flex items-center justify-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled px-3 py-2 cursor-not-allowed">‹</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 text-gray-700">‹</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @php
                $start = max(1, $paginator->currentPage() - 2);  // start at current page minus 2, or 1 if too low
                $end = min($paginator->lastPage(), $paginator->currentPage() + 2);  // end at current page plus 2, or last page if too high
            @endphp

            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $paginator->currentPage())
                    <li class="active px-3 py-2 bg-blue-500 text-white rounded">{{ $i }}</li>
                @else
                    <li>
                        <a href="{{ $paginator->url($i) }}" class="px-3 py-2 text-gray-700 hover:bg-blue-200 rounded">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 text-gray-700">›</a>
                </li>
            @else
                <li class="disabled px-3 py-2 cursor-not-allowed">›</li>
            @endif
        </ul>
    </nav>
@endif
