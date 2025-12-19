<nav role="navigation" aria-label="Pagination Navigation" class="my-8">
    <ul class="flex items-center justify-center space-x-1">
        <!-- 上一页 -->
        @if ($paginator->onFirstPage())
            <li>
                <span class="px-3 py-2 text-sm font-medium text-gray-300 border border-gray-200 rounded-md cursor-not-allowed">
                    &laquo;
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" 
                   class="px-3 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 hover:text-gray-900 hover:border-gray-400 transition duration-150 ease-in-out">
                    &laquo;
                </a>
            </li>
        @endif

        <!-- 页码 -->
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <span class="px-4 py-2 text-sm font-medium text-blue-600 border border-blue-300 bg-blue-50 rounded-md">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" 
                               class="px-4 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 hover:text-gray-900 hover:border-gray-400 transition duration-150 ease-in-out">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- 下一页 -->
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" 
                   class="px-3 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 hover:text-gray-900 hover:border-gray-400 transition duration-150 ease-in-out">
                    &raquo;
                </a>
            </li>
        @else
            <li>
                <span class="px-3 py-2 text-sm font-medium text-gray-300 border border-gray-200 rounded-md cursor-not-allowed">
                    &raquo;
                </span>
            </li>
        @endif
    </ul>
</nav>
