@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Data Guru</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')
    <div class="row">
        <div class="col-12">
        <x-adminlte-profile-widget name="John Doe" desc="123213213232" theme="biru-sp-cs"
                    img="https://picsum.photos/id/1/100">
                    <x-adminlte-profile-col-item title="Mata Pelajaran" text="Matematika, Bahasa Indonesia, Bahasa Inggris, Fisika" url=""/>
                    <x-adminlte-profile-col-item title="" text=""/>
                    <x-adminlte-profile-col-item title="Wali Kelas" text="7A, 7B" />
                </x-adminlte-profile-widget>
        </div>
    </div>

    @php
    $heads = [
        ['label' => '#', 'width' => 5],
        ['label' => 'Tahun Ajaran', 'width' => 10],
        ['label' => 'Semester', 'width' => 10],
        ['label' => 'Mata Pelajaran', 'width' => 20],
        ['label' => 'Mengajar Di Kelas', 'width' => 40],
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
            [1, '2020/2021', 'Ganjil', 'Bahasa Indonesia', '7A'],
            [2, '2020/2021', 'Ganjil', 'Bahasa Inggris', '7B'],
            [3, '2020/2021', 'Genap', 'Matematika', '7C'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('op-data-guru/detail') }}" type="button" class="btn btn-secondary" style="background-color: #0E6BA8">Mata Pelajaran</a>
                        <a href="{{ url('op-data-guru/detail-personal') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Diri</a>
                        <a href="{{ url('op-data-guru/detail-family') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Keluarga</a>
                        <a href="{{ url('op-data-guru/detail-study') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Pendidikan</a>
                        <a href="{{ url('op-data-guru/detail') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Hak Akses</a>
                    </div>
                </div>
                
                <div class="card-body">
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

    <x-adminlte-modal id="modalCustom" title="Persetujuan Pengguna" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;text-align:center;">
            <div style="height:100px;margin-top:80px;color:#D81159;">
                <i class="far fa-lg fa-fw fa-question-circle" style="font-size: 100px;"></i>
            </div>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Pengajuan data guru akan diterima</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Atas Nama Guru 1</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Dengan Email Email 1</span>
            <br />
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Terima"/>
            <x-adminlte-button theme="danger" label="Tolak" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
@stop
