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
        ['label' => 'Universitas', 'width' => 30],
        ['label' => 'Jurusan', 'width' => 30],
        ['label' => 'Program Studi', 'width' => 10],
        ['label' => 'Tahun Masuk', 'width' => 10],
        ['label' => 'Tahun Lulus', 'width' => 10],
        ['label' => '', 'width' => 40],
    ];

    $btnEdit = '<button class="btn btn-xs text-primary" data-toggle="modal" data-target="#modalCustomEditFam" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs text-danger" data-toggle="modal" data-target="#modalCustomDelete" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetails = '<button class="btn btn-xs text-teal" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </button>';

    $config = [
        'data' => [
            [1, 'Universitas', 'Jurusan', 'Program Studi', 'Tahun Masuk', 'Tahun Lulus', '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            [2, 'Universitas', 'Jurusan', 'Program Studi', 'Tahun Masuk', 'Tahun Lulus', '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            [3, 'Universitas', 'Jurusan', 'Program Studi', 'Tahun Masuk', 'Tahun Lulus', '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, null, ['orderable' => false], ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('op-data-op/detail-personal') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Diri</a>
                        <a href="{{ url('op-data-op/detail-family') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Keluarga</a>
                        <a href="{{ url('op-data-op/detail-study') }}" type="button" class="btn btn-secondary" style="background-color: #0E6BA8;">Data Pendidikan</a>
                        <a href="{{ url('op-data-op/detail') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Hak Akses</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col-4">
                            <x-adminlte-button label="Tambah Data Pendidikan" data-toggle="modal" data-target="#modalCustomAddFam" theme="biru-sp-cs"/>
                        </div> 
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
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
        </div>
    </div>

    <x-adminlte-modal id="modalCustomAddFam" title="Tambah Data Pendidikan" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;">
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Universitas" placeholder="Universitas" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Jurusan" placeholder="Jurusan" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Program Studi" name="sel2Basic">
                        <option>S1</option>
                        <option disabled>S2</option>
                        <option>S3</option>
                    </x-adminlte-select2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Tahun Masuk" placeholder="Tahun Masuk" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Tahun Lulus" placeholder="Tahun Lulus" disable-feedback/>
                </div>
            </div>
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Simpan"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>

    <x-adminlte-modal id="modalCustomEditFam" title="Ubah Data Pendidikan" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;">
        <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Universitas" placeholder="Universitas" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Jurusan" placeholder="Jurusan" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Program Studi" name="sel2Basic">
                        <option>S1</option>
                        <option disabled>S2</option>
                        <option>S3</option>
                    </x-adminlte-select2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Tahun Masuk" placeholder="Tahun Masuk" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Tahun Lulus" placeholder="Tahun Lulus" disable-feedback/>
                </div>
            </div>
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Simpan"/>
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
            <span style="font-size: 20px;font-weight: 700;">Data pendidikan akan anda hapus</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Apakah anda yakin ?</span>
            
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Hapus"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
@stop
