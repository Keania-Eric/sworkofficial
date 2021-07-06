@if ($paginator->hasPages())
<div class="row justify-content-center mt-7">
    <div class="col-xl-4">
        <div class="pagination">
            <ul class="list-unstyled text-center mx-auto">
                <li>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())

                        <a href="#" aria-disabled="true" aria-label="@lang('pagination.previous')"><i class="fa fa-chevron-left"></i></a>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-chevron-left"></i></a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <a href="#">{{ $element }}</a>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <a href="#">...</a>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-chevron-right"></i></a>
                    @else
                        <a href="#" aria-disabled="true" aria-label="@lang('pagination.next')"><i class="fa fa-chevron-right"></i></a>
                    @endif
                    
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
