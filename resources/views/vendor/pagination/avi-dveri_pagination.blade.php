@if ($paginator->hasPages())
    <div class="shop-pagination  text-center">
        <div class="pagination">
            <ul>
                @if ($paginator->onFirstPage())
                    <li aria-label="@lang('pagination.previous')">
                        <a>
                            <i class="zmdi zmdi-long-arrow-left"></i>
                        </a>
                    </li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="zmdi zmdi-long-arrow-left"></i></a></li>
                @endif
                @foreach ($elements as $element)
                    {{--"Three Dots" Separator--}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a>{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </a>
                    </li>
                @else
                    <li aria-label="@lang('pagination.next')">
                        <a>
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endif