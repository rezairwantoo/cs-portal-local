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
        ['label' => 'Nama Modul', 'width' => 20],
        ['label' => 'Tingkat', 'width' => 20],
        ['label' => '', 'width' => 20],
    ];

    $url = url("/op-jadwal-pelajaran/edit");
    $btnEdit = '<a data-toggle="modal" data-target="#modalAddMataPelajaran" class="btn btn-xs " title="Edit">
                    <i class="far fa-lg fa-fw fa-file-pdf"></i></a>';
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
            [1, 'Bahasa Indonesia', 'Bahasa Indonesia modul', '7',  '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            [2, 'Bahasa Indonesia', 'Bahasa Indonesia modul', '7',  '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            [3, 'Bahasa Indonesia', 'Bahasa Indonesia modul', '7',  '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            [4, 'Bahasa Indonesia', 'Bahasa Indonesia modul', '7',  '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
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
                    <h3 class="card-title">Daftar Modul</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <a data-toggle="modal" data-target="#modalAddMataPelajaran"  class="btn btn-biru-sp-cs" label="Tambah Jadwal" theme="biru-sp-cs" >
                            Tambah Modul
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

    <x-adminlte-modal id="modalAddMataPelajaran" title="Tambah Data Mata Pelajaran" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;">
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Nama Modul" placeholder="Nama" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Mata Pelajaran" name="sel2Basic">
                        <option>Bahasa Indonesia</option>
                        <option disabled>Matematika</option>
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Tingkat" name="sel2Basic">
                        <option>7</option>
                        <option disabled>8</option>
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label>File</label>
                    <x-adminlte-input-file name="ifPholder" igroup-size="sm" placeholder="Choose a file...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                </div>
            </div>
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Simpan"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
@stop
