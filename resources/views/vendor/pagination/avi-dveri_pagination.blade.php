@if ($paginator->hasPages())
    <div class="shop-pagination text-center">
        <div class="pagination">
            <ul>
                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span><i class="zmdi zmdi-long-arrow-left"></i></span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                            <i class="zmdi zmdi-long-arrow-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Elements --}}
                @foreach ($elements as $element)
                    {{-- "..." separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true">
                            <span>{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Page links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active" aria-current="page">
                                    <span>{{ $page }}</span>
                                </li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span><i class="zmdi zmdi-long-arrow-right"></i></span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endif