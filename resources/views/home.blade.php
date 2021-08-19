@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
    <p class="mb-0">Selamat Datang Operator 1</p>
@stop
<?php $totalSiswa = 100;?>
@section('content')
    <div class="row">
        <div class="col-4">
            <x-adminlte-info-box title="Total Siswa" text="{{$totalSiswa}}" icon="fas fa-lg fa-users" icon-theme="ijo-cs"/>
        </div>
        <div class="col-4">
            <x-adminlte-info-box title="Total Staff" text="{{$totalSiswa}}" icon="fas fa-lg fa-users" icon-theme="biru-sp-cs"/>
        </div>
        <div class="col-4">
            <x-adminlte-info-box title="Total Kelas" text="{{$totalSiswa}}" icon="fas fa-lg fa-window-restore" icon-theme="orange1-cs"/>
        </div>
    </div>

    @php
    $heads = [
        'ID',
        'Name',
        ['label' => 'Phone', 'width' => 40],
        ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ];

    $btnEdit = '<button class="btn btn-xs text-primary" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs text-danger" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetails = '<button class="btn btn-xs text-teal" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </button>';

    $config = [
        'data' => [
            [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Jadwal Pelajaran Hari Ini</h3>
                </div>
                
                <div class="card-body">
                    <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" theme="light" striped hoverable>
                        @foreach($config['data'] as $row)
                            <tr>
                                @foreach($row as $cell)
                                    <td>{!! $cell !!}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop
