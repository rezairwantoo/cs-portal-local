@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Data Siswa</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')
    
    @php
    $url = url("/op-data-siswa/detail");
    $heads = [
        '#',
        'Nisn',
        ['label' => 'Nama Siswa', 'width' => 40],
        ['label' => 'Email', 'no-export' => true, 'width' => 30],
        ['label' => 'Kelas', 'no-export' => true, 'width' => 5],
    ];

    $btnEdit = '<button class="btn btn-xs text-primary" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs text-danger" data-toggle="modal" data-target="#modalCustomDelete" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetails = '<a href="'.$url.'" class="btn btn-xs text-teal" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i></a>';

    $config = [
        'data' => [
            [22,2232133213, 'John Bender', 'Email', '7A', '<nobr>'.$btnDetails.$btnDelete.'</nobr>'],
            [19,2232133213, 'Sophia Clemens', 'Email', '7B', '<nobr>'.$btnDetails.$btnDelete.'</nobr>'],
            [3,2232133213, 'Peter Sousa','Email', '7C', '<nobr>'.$btnDetails.$btnDelete.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false], ['orderable' => false], ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Siswa</h3>
                </div>
                
                <div class="card-body">
                <div class="row">
                    <div class="col-4">
                    <x-adminlte-select2 name="sel2Basic">
                        <option>Seluruh Kelas</option>
                        <option disabled>Kelas 7A</option>
                        <option selected>Kelas 7B</option>
                    </x-adminlte-select2>

                    </div>
                    <div clas="col-4">
                        <x-adminlte-button label="Import Data Siswa" data-toggle="modal" data-target="#modalUploadFile" theme="biru-sp-cs"/>
                    </div>
                </div>
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

    <x-adminlte-modal id="modalUploadFile" title="Tambah Data Siswa" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="margin: auto;width: 50%;padding: 10px;text-align:center;">
            <div style="margin-bottom:20px;color:#D81159;">
                <span>Silakan upload data siswa yang akan anda tambahkan</span>
                
            </div>
            <x-adminlte-input-file name="ifPholder" igroup-size="sm" placeholder="Choose a file...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>
            <a href="#"><span>Download Template Import Data Guru</span></a>
            
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Upload"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-modal id="modalCustomDelete" title="Hapus Data Guru" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;text-align:center;">
            <div style="height:100px;margin-top:80px;color:#D81159;">
                <i class="far fa-lg fa-fw fa-question-circle" style="font-size: 100px;"></i>
            </div>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Data siswa, akan anda hapus</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Atas Nama siswa 1</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Dengan Email Email 1</span>
            <br />
            <br />
            <br />
            <span style="font-size: 20px;font-weight: 700;">Apakah anda yakin ?</span>
            
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Hapus"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
@stop
