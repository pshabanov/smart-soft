@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="Назад">
                    <span class="px-6 py-4 block" aria-hidden="true">Назад</span>
                </li>
            @else
                <li>
                    <a class="cursor-pointer bg-amber-100 px-6 py-4 block" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Назад">Назад</a>
                </li>
            @endif


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="cursor-pointer bg-amber-100 px-6 py-4 block" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Вперед">Вперед</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="Вперед">
                    <span class="px-6 py-4 block" aria-hidden="true">Вперед</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
