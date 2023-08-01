@if (in_array($field, $orderable))
    @if ($sortBy !== $field)
        <i wire:click="sortBy('{{ $field }}')" class="bi bi-chevron-contract cursor-pointer" aria-hidden="true"></i>
    @elseif ($sortBy === $field && $sortDirection == 'desc')
        <i wire:click="sortBy('{{ $field }}')" class="bi bi-sort-down cursor-pointer text-blue-500" aria-hidden="true"></i>
    @else
        <i wire:click="sortBy('{{ $field }}')" class="bi bi-sort-up cursor-pointer text-blue-500" aria-hidden="true"></i>
    @endif
@endif