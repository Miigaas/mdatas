@if ($paginator->hasPages())
<nav aria-label="" class="add_top_20">

    <ul class="pagination pagination-sm">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </li>
    @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
    @endif
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Өмнөх</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Дараагийнх</a>
        </li>
    </ul>
</nav>
@endif
