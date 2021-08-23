@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-gradient-primary">
            <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">

            <div>
            <div class="text-value-lg">
                {{ $household }}
            </div>
            <div>
                Registed Households
            </div>
        </div>
        <div class="btn-group">
            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span href="" class="cil-settings" style="color:#fff"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" style="margin: 0px;">
                <a class="dropdown-item" href="#">View More</a>
            </div>
        </div>
    </div>
    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
        <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
                <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
            </div>
        </div>
        <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"></canvas>
    </div>
</div>
</div>
    <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-gradient-info">
    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
    <div>
    <div class="text-value-lg">{{ $scans }}</div>
    <div>QR Code Scans</div>
    </div>
    <div class="btn-group">
    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span href="" class="cil-qr-code" style="color:#fff"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">View More</a>
    </div>
    </div>
    </div>
    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <canvas class="chart chartjs-render-monitor" id="card-chart2" height="70" width="265" style="display: block; width: 265px; height: 70px;"></canvas>
    </div>
    </div>
    </div>
    
    <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-gradient-warning">
    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
    <div>
    <div class="text-value-lg">{{ $zones }}</div>
    <div>Zones</div>
    </div>
    <div class="btn-group">
    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span href="" class="cil-map" style="color:#fff"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">View More</a>
    </div>
    </div>
    </div>
    <div class="c-chart-wrapper mt-3" style="height:70px;">
        <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70" width="297"></canvas>
    </div>
    </div>
    </div>
    
    <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-gradient-danger">
    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
    <div>
    <div class="text-value-lg">{{ $buildings }}</div>
    <div>Buildings</div>
    </div>
    <div class="btn-group">
    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span href="" class="cil-building" style="color:#fff"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">View More</a>
    </div>
    </div>
    </div>
    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <canvas class="chart chartjs-render-monitor" id="card-chart4"></canvas>
    </div>
    </div>
    </div>
    
    </div>
    <div style="width:100%;">
        {!! $chartjs->render() !!}
    </div>
    
    <div style="width:100%;">
        {!! $dzongkhagPopulation->render() !!}
    </div>

    
@endsection
