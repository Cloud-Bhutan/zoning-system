<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\AllScanLog;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AllscanlogsTable extends TableComponent
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
        $query = AllScanLog::query();
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
            Column::make(__('Household Id'), 'household_detail_id')
                ->searchable()
                ->sortable(),
            Column::make(__('(Lat, Lng)'))
                ->view('backend.all-scan-log.includes.geolocation', 'allscan'),
            Column::make(__('Sub Zone'), 'sub_zone_id')
                ->searchable()
                ->sortable()
                ->view('backend.all-scan-log.includes.sub-zone', 'allscan'),
            Column::make(__('Dzongkhag'))
                ->view('backend.all-scan-log.includes.dzongkhag', 'allscan'),
            Column::make(__('Scaned At'), 'created_at')
                ->searchable()
                ->sortable()
                ->view('backend.components.dateformat', 'date'),
            Column::make(__('Scanned By'), 'user_id')
                ->searchable()
                ->sortable()
                ->view('backend.all-scan-log.includes.user', 'allscan'),
            Column::make(__('Actions'))
                ->view('backend.all-scan-log.includes.actions', 'allscan'),
        ];
    }
}
