<nav role="navigation" aria-label="Pagination Navigation" class="my-8">
    <ul class="flex justify-center space-x-2">
        @if ($paginator->onFirstPage())
            <li>
                <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    上一页
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" 
                   class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-150">
                    上一页
                </a>
            </li>
        @endif
        
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <span class="px-4 py-2 text-white bg-blue-600 rounded-lg">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" 
                               class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-150">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" 
                   class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-150">
                    下一页
                </a>
            </li>
        @else
            <li>
                <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    下一页
                </span>
            </li>
        @endif
    </ul>
</nav>
