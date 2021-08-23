<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SubZone;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubZonesTable extends TableComponent
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
        $query = SubZone::with('zone');
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
            Column::make(__('Parent Zone'), 'zone_id')
                ->searchable()
                ->sortable()
                ->view('backend.sub-zone.includes.zone', 'sub_zone'),
            Column::make(__('Dzongkhag'))
                ->sortable()
                ->view('backend.sub-zone.includes.dzongkhag', 'sub_zone'),
            Column::make(__('Created At'), 'created_at')
                ->searchable()
                ->sortable()
                ->view('backend.components.dateformat', 'date'),
            Column::make(__('Actions'))
                ->view('backend.sub-zone.includes.actions', 'sub_zone'),
        ];
    }
}
