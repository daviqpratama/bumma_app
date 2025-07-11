@if ($paginator->hasPages())
    <nav class="flex items-center justify-center space-x-1 mt-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="bg-[#cbd7b4] text-gray-600 px-3 py-1 rounded shadow">&lt;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="bg-[#cbd7b4] text-black px-3 py-1 rounded shadow hover:bg-[#b9c6a1]">&lt;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="text-gray-600 px-3 py-1">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="bg-[#5e7444] text-white px-3 py-1 rounded shadow">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="bg-[#cbd7b4] text-black px-3 py-1 rounded shadow hover:bg-[#b9c6a1]">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="bg-[#cbd7b4] text-black px-3 py-1 rounded shadow hover:bg-[#b9c6a1]">&gt;</a>
        @else
            <span class="bg-[#cbd7b4] text-gray-600 px-3 py-1 rounded shadow">&gt;</span>
        @endif
    </nav>
@endif
