<nav role="navigation" aria-label="Pagination Navigation" class="my-8">
    <ul class="flex items-center justify-center space-x-2">
        <!-- 上一页 -->
        @if ($paginator->onFirstPage())
            <li>
                <span class="inline-flex items-center justify-center w-10 h-10 text-gray-400 bg-gray-100 rounded-full cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" 
                   class="inline-flex items-center justify-center w-10 h-10 text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-50 hover:text-gray-900 transition duration-150 ease-in-out shadow-sm hover:shadow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
            </li>
        @endif

        <!-- 页码 -->
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <span class="inline-flex items-center justify-center w-10 h-10 text-white bg-blue-600 rounded-full shadow-sm">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" 
                               class="inline-flex items-center justify-center w-10 h-10 text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-50 hover:text-gray-900 transition duration-150 ease-in-out shadow-sm hover:shadow">
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
                   class="inline-flex items-center justify-center w-10 h-10 text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-50 hover:text-gray-900 transition duration-150 ease-in-out shadow-sm hover:shadow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </li>
        @else
            <li>
                <span class="inline-flex items-center justify-center w-10 h-10 text-gray-400 bg-gray-100 rounded-full cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
            </li>
        @endif
    </ul>
    
    <!-- 页面信息 -->
    <div class="mt-4 text-center text-sm text-gray-600">
        <p>
            第 <span class="font-semibold text-gray-900">{{ $paginator->currentPage() }}</span> 页，
            共 <span class="font-semibold text-gray-900">{{ $paginator->lastPage() }}</span> 页
        </p>
    </div>
</nav>
