@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Mata Pelajaran</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')

    @php
    $heads = [
        ['label' => '#', 'width' => 5],
        ['label' => 'Nama Mata Pelajaran', 'width' => 20],
        ['label' => 'Status', 'width' => 20],
        ['label' => '', 'width' => 20],
    ];

    $url = url("/op-jadwal-pelajaran/edit");
    $btnEdit = '<a data-toggle="modal" data-target="#modalAddMataPelajaran" class="btn btn-xs text-primary" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i></a>';
    $btnDelete = '<button class="btn btn-xs text-danger" data-toggle="modal" data-target="#modalCustomDelete" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetails = '<a href="'.$url.'" class="btn btn-xs text-teal" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
</a>';

    $btnActivate = '<button class="btn btn-xs text-green" title="Aktifkan"><i class="fa fa-lg fa-fw fa-check"></i></button>';
    $btnDeactivate = '<button class="btn btn-xs text-danger" title="Non Aktifkan"><i class="fa fa-lg fa-fw fa-times"></i></button>';
    $config = [
        'data' => [
            [1, 'Bahasa Indonesia', 'Aktif',       '<nobr>'.$btnDeactivate.$btnEdit.'</nobr>'],
            [2, 'Bahasa Indonesia', 'Aktif',       '<nobr>'.$btnDeactivate.$btnEdit.'</nobr>'],
            [3, 'Bahasa Indonesia', 'Tidak Aktif', '<nobr>'.$btnActivate.$btnEdit.'</nobr>'],
            [4, 'Bahasa Indonesia', 'Aktif',       '<nobr>'.$btnDeactivate.$btnEdit.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];

    $headsGuru = [
        ['label' => '#', 'width' => 5],
        ['label' => 'Mata Pelajaran', 'width' => 20],
        ['label' => 'Nama Guru', 'width' => 20],
        ['label' => 'Kelas', 'width' => 20],
        ['label' => 'Tahun Ajaran', 'width' => 20],
        ['label' => 'Semester', 'width' => 10],
        ['label' => '', 'width' => 5],
    ];

    $url = url("/op-jadwal-pelajaran/edit");
    $btnEditGuru = '<a href="'.$url.'" class="btn btn-xs text-primary" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i></a>';
    $btnDeleteGuru = '<button class="btn btn-xs text-danger" data-toggle="modal" data-target="#modalCustomDelete" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetailsGuru = '<a href="'.$url.'" class="btn btn-xs text-teal" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
</a>';

    $btnActivateGuru = '<button class="btn btn-xs text-green" title="Aktifkan"><i class="fa fa-lg fa-fw fa-check"></i></button>';
    $btnDeactivateGuru = '<button class="btn btn-xs text-danger" title="Non Aktifkan"><i class="fa fa-lg fa-fw fa-times"></i></button>';
    $configGuru = [
        'data' => [
            [1, 'Bahasa Indonesia', 'Nama Guru', '7A, 7B, 7C, 8A, 8B, 8C,', '2020-2021', 'Genap', '<nobr>'.$btnDeactivate.$btnEditGuru.'</nobr>'],
            [2, 'Bahasa Indonesia', 'Nama Guru', '7A, 7B, 7C, 8A, 8B, 8C,', '2020-2021', 'Genap', '<nobr>'.$btnDeactivate.$btnEditGuru.'</nobr>'],
            [3, 'Bahasa Indonesia', 'Nama Guru', '7A, 7B, 7C, 8A, 8B, 8C,', '2020-2021', 'Genap', '<nobr>'.$btnActivate.$btnEditGuru.'</nobr>'],
            [4, 'Bahasa Indonesia', 'Nama Guru', '7A, 7B, 7C, 8A, 8B, 8C,', '2020-2021', 'Genap', '<nobr>'.$btnDeactivate.$btnEditGuru.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, ['orderable' => false], ['orderable' => false], ['orderable' => false], ['orderable' => false], ['orderable' => false], ['orderable' => false]],
    ];
    $configGuru["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Jadwal Pelajaran</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <a data-toggle="modal" data-target="#modalAddMataPelajaran"  class="btn btn-biru-sp-cs" label="Tambah Jadwal" theme="biru-sp-cs" >
                            Tambah Mata Pelajaran
                        </a>
                    </div>
                    
                    <br />
                    <x-adminlte-datatable id="table2" :heads="$heads" :config="$config" theme="light" striped hoverable>
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

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Guru Mata Pelajaran</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <a href='{{url("/op-mata-pelajaran/add")}}' class="btn btn-biru-sp-cs" label="Tambah Jadwal" theme="biru-sp-cs" >
                            Tugaskan Guru Mata Pelajaran
                        </a>
                    </div>
                    
                    <br />
                    <x-adminlte-datatable id="table3" :heads="$headsGuru" :config="$configGuru" theme="light" striped hoverable>
                        @foreach($configGuru['data'] as $row)
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

    <x-adminlte-modal id="modalAddMataPelajaran" title="Tambah Data Mata Pelajaran" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:100px;margin: auto;width: 50%;padding: 10px;">
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Nama Mata Pelajaran" placeholder="Nama" disable-feedback/>
                </div>
            </div>
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Simpan"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
@stop
