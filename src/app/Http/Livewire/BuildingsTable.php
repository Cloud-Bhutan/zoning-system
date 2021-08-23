<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Building;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;


class BuildingsTable extends TableComponent
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
        $query = Building::query();
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
            Column::make(__('Building No.'), 'building_number')
                ->searchable()
                ->sortable(),
            Column::make(__('(Lat, Lng)'))
                ->sortable()
                ->view('backend.building.includes.geolocation', 'building'),
            Column::make(__('Sub Zone'), 'sub_zone_id')
                ->searchable()
                ->sortable()
                ->view('backend.building.includes.sub-zone', 'building'),
            Column::make(__('Zone'))
                ->sortable()
                ->view('backend.building.includes.zone', 'building'),
            Column::make(__('Dzongkhag'))
                ->sortable()
                ->view('backend.building.includes.dzongkhag', 'building'),
            Column::make(__('Updated At'), 'updated_at')
                ->searchable()
                ->sortable()
                ->view('backend.components.dateformat', 'date'),
            Column::make(__('Actions'))
                ->view('backend.building.includes.actions', 'building'),
        ];
    }
}
