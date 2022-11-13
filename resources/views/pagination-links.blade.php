@if ($paginator->hasPages())
<div class="pagination">

    @if ($paginator->onFirstPage())
    @else
    <button wire:click="previousPage"><i class="fa-solid fa-chevron-left"></i></button>
    @endif
 


    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <button class="number" style="color: var(--text-white); font-weight: 700; font-size: 17px">{{ $page }}</button>   
                @elseif ($paginator->currentPage() <= 4 && $page <= 5)
                    <button class="number" wire:click="gotoPage({{$page}})">{{ $page }}</button>       
                @elseif ($paginator->currentPage() > 4 && $page === 3)
                    <span class="number">...</span>
                @elseif ($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() - 1 || $page == 1 || $page == $paginator->lastPage())
                    <button class="number" wire:click="gotoPage({{$page}})">{{ $page }}</button>
                @elseif ($paginator->currentPage() >= $paginator->lastPage() - 3 && $page >= $paginator->lastPage() - 4)
                    <button class="number" wire:click="gotoPage({{$page}})">{{ $page }}</button>
                @elseif ($paginator->currentPage() <= $paginator->lastPage() - 4 && $page === $paginator->lastPage() - 1)
                    <span class="number">...</span>
                @endif
            @endforeach
        @endif
    @endforeach


    @if ($paginator->hasMorePages())
    <button wire:click="nextPage"><i class="fa-solid fa-chevron-right"></i></button>
    @endif
</div>
@endif