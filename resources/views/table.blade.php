<div>
    <div class="flex flex-row justify-content-between">
        <div class="col-auto order-last order-md-first">
            <div class="input-group mb-3">
                <input type="search" placeholder="{{ __('Search') }}" wire:model.live="search">
            </div>
        </div>
        @if($header_view)
            <div class="col-md-auto mb-3">
                @include($header_view)
            </div>
        @endif
    </div>

    <div>
        @if($models->isEmpty())
            <div class="">
                {{ __('No results to display.') }}
            </div>
        @else
            <x-livewire3-tables::table>
                <x-slot name="thead">
                    @if($checkbox)
                        <x-livewire3-tables::table.th>
                            <x-livewire3-tables::checkbox-all />
                        </x-livewire3-tables::table.th>
                    @endif

                    @foreach($columns as $column)
                        <x-livewire3-tables::table.th>
                            {{ $column->heading }}
                        </x-livewire3-tables::table.th>
                    @endforeach
                </x-slot>
                <x-livewire3-tables::table.tbody>
                    @forelse($models as $model)
                        <x-livewire3-tables::table.tr>
                            @foreach($columns as $column)
                            <x-livewire3-tables::table.td>
                                {{ Arr::get($model->toArray(), $column->attribute) }}
                            </x-livewire3-tables::table.td>
                            @endforeach
                        </x-livewire3-tables::table.tr>
                    @empty
                        <x-livewire3-tables::table.tr>
                               <x-livewire3-tables::table.td>
                                {{ __('No results found') }}
                            </x-livewire3-tables::table.td> 
                        </x-livewire3-tables::table.tr>
                    @endforelse
                </x-livewire3-tables::table.tbody>
            </x-livewire3-tables::table>

            <div class="p-4">
                <div class="pt-3">
                    {{ $models->links() }}
                </div>
            </div>
        @endif
    </div>
     

   <div class="card mb-3">
        @if($models->isEmpty())
            <div class="card-body">
                {{ __('No results to display.') }}
            </div>
        @else
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table {{ $table_class }} mb-0">
                        <thead class="{{ $thead_class }}">
                        <tr>
                            @if($checkbox && $checkbox_side == 'left')
                                @include('livewire3-tables::checkbox-all')
                            @endif

                            @foreach($columns as $column)
                                <th class="align-middle text-nowrap border-top-0 {{ $this->thClass($column->attribute) }}">
                                    @if($column->sortable)
                                        <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')">
                                            {{ $column->heading }}

                                            @if($sort_attribute == $column->attribute)
                                                <i class="fa fa-sort-amount-{{ $sort_direction == 'asc' ? 'up-alt' : 'down' }}"></i>
                                            @else
                                                <i class="fa fa-sort-amount-up-alt" style="opacity: .35;"></i>
                                            @endif
                                        </span>
                                    @else
                                        {{ $column->heading }}
                                    @endif
                                </th>
                            @endforeach

                            @if($checkbox && $checkbox_side == 'right')
                                @include('livewire3-tables::checkbox-all')
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $model)
                            <tr class="{{ $this->trClass($model) }}">
                                @if($checkbox && $checkbox_side == 'left')
                                    @include('livewire3-tables::checkbox-row')
                                @endif

                                @foreach($columns as $column)
                                    <td class="align-middle {{ $this->tdClass($column->attribute, $value = Arr::get($model->toArray(), $column->attribute)) }}">
                                        @if($column->view)
                                            @include($column->view)
                                        @else
                                            {{ $value }}
                                        @endif
                                    </td>
                                @endforeach

                                @if($checkbox && $checkbox_side == 'right')
                                    @include('livewire3-tables::checkbox-row')
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <div class="row justify-content-between">
        <div class="col-auto">
            {{ $models->links() }}
        </div>
        @if($footer_view)
            <div class="col-md-auto">
                @include($footer_view)
            </div>
        @endif
    </div>
</div>
