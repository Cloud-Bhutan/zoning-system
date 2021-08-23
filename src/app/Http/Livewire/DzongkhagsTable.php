<?php

namespace App\Http\Livewire;

use Livewire\Component;


use App\Dzongkhag;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Livewire\WithPagination;

class DzongkhagsTable extends TableComponent
{

    use WithPagination;
    /**
     * @var string
     */
    public $sortField = 'name';


    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Dzongkhag::query();

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
            Column::make(__('Created At'), 'created_at')
                ->searchable()
                ->sortable()
                ->view('backend.components.dateformat', 'date'),
            Column::make(__('Updated At'), 'updated_at')
                ->searchable()
                ->sortable()
                ->view('backend.components.dateformat', 'date'),
            Column::make(__('Actions'))
                ->view('backend.dzongkhag.includes.actions', 'dzongkhag'),
        ];
    }
}