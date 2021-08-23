<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Zone;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;


class ZonesTable extends TableComponent
{
    
    public $loadingIndicator = true;
    
    /**
     * @var string
     */
    public $sortField = 'id';


    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Zone::query();
        return $query;
    }


    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->searchable()
                ->sortable(),
            Column::make(__('Name'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(__('Dzongkhag'), 'dzongkhag_id')
                ->searchable()
                ->sortable()
                ->view('backend.zone.includes.dzongkhag', 'zone'),
            Column::make(__('Created At'), 'created_at')
                ->searchable()
                ->sortable()
                ->view('backend.components.dateformat', 'date'),
            Column::make(__('Actions'))
                ->view('backend.zone.includes.actions', 'zone'),
        ];
    }
}
