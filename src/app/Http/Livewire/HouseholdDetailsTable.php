<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\HouseholdDetail;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class HouseholdDetailsTable extends TableComponent
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
        $query = HouseholdDetail::query();
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
            Column::make(__('Mobile No'), 'mobile_no')
                ->searchable()
                ->sortable(),
            Column::make(__('Total Persons'))
                ->view('backend.household-detail.includes.persons', 'householdDetail'),
            Column::make(__('Nationality'), 'nationality')
                ->searchable()
                ->sortable(),
            Column::make(__('Building No'), 'building_id')
                ->searchable()
                ->sortable(),
            Column::make(__('Zone'), 'building_id')
                ->searchable()
                ->sortable()
                ->view('backend.household-detail.includes.building', 'householdDetail'),
            Column::make(__('Updated At'), 'created_at')
                ->searchable()
                ->sortable()
                ->view('backend.components.dateformat', 'date'),
            Column::make(__('Added By'), 'user_id')
                ->searchable()
                ->sortable()
                ->view('backend.household-detail.includes.user', 'householdDetail'),
            Column::make(__('Actions'))
                ->view('backend.household-detail.includes.actions', 'householdDetail'),
        ];
    }
}
