<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\DailyScanLog;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DailyscanlogsTable extends TableComponent
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
        $query = DailyScanLog::query();
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
                ->view('backend.daily-scan-log.includes.geolocation', 'dailyscan'),
            Column::make(__('Sub Zone'), 'sub_zone_id')
                ->searchable()
                ->sortable()
                ->view('backend.daily-scan-log.includes.sub-zone', 'dailyscan'),
            Column::make(__('Dzongkhag'))
                ->view('backend.daily-scan-log.includes.dzongkhag', 'dailyscan'),
            Column::make(__('Scaned At'), 'created_at')
                ->searchable()
                ->sortable()
                ->view('backend.components.dateformat', 'date'),
            Column::make(__('Scanned By'), 'user_id')
                ->searchable()
                ->sortable()
                ->view('backend.daily-scan-log.includes.user', 'dailyscan'),
            Column::make(__('Actions'))
                ->view('backend.daily-scan-log.includes.actions', 'dailyscan'),
        ];
    }
}
