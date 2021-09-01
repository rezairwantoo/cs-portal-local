@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Jadwal Pelajaran</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')

    @php
    $heads = [
        ['label' => '#', 'width' => 5],
        ['label' => 'Pokok Pembahasan', 'width' => 20],
        ['label' => 'Mata Pelajaran', 'width' => 20],
        ['label' => 'Nama Guru', 'width' => 20],
        ['label' => 'Jam', 'width' => 10],
        ['label' => 'Kelas', 'width' => 10],
        ['label' => 'Total Siswa Hadir', 'width' => 10],
        ['label' => '', 'width' => 5],
    ];

    $url = url("/op-jadwal-pelajaran/edit");
    $btnEdit = '<a href="'.$url.'" class="btn btn-xs text-primary" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i></a>';
    $btnDelete = '<button class="btn btn-xs text-danger" data-toggle="modal" data-target="#modalCustomDelete" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetails = '<a href="'.$url.'" class="btn btn-xs text-teal" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
</a>';

    $config = [
        'data' => [
            [1, 'Majas 1', 'Bahasa Indonesia', 'nama guru', '14:00 - 15:30', '7A', '10 dari 30', '<nobr>'.$btnEdit.$btnDetails.'</nobr>'],
            [2, 'Majas 2', 'Bahasa Indonesia', 'nama guru', '14:00 - 15:30', '7A', '10 dari 30', '<nobr>'.$btnEdit.$btnDetails.'</nobr>'],
            [3, 'Majas 3', 'Bahasa Indonesia', 'nama guru', '14:00 - 15:30', '7A', '10 dari 30', '<nobr>'.$btnEdit.$btnDetails.'</nobr>'],
            [4, 'Majas 4', 'Bahasa Indonesia', 'nama guru', '14:00 - 15:30', '7A', '10 dari 30', '<nobr>'.$btnEdit.$btnDetails.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null,null, null, null, null, ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Jadwal Pelajaran</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <x-adminlte-select2 label="Tahun Ajaran"  name="sel2Basic">
                                <option></option>
                                <option disabled>2021-2020</option>
                                <option selected>2020-2019</option>
                            </x-adminlte-select2>

                        </div>
                        <div class="col-3">
                            <x-adminlte-select2 label="Semester"  name="sel2Basic">
                                <option></option>
                                <option disabled>Genap</option>
                                <option selected>Ganjil</option>
                            </x-adminlte-select2>

                        </div>
                        <div class="col-3">
                            <x-adminlte-select2 label="Tingkat"  name="sel2Basic">
                                <option></option>
                                <option disabled>7</option>
                                <option selected>8</option>
                                <option selected>9</option>
                            </x-adminlte-select2>

                        </div>
                        <div class="col-3">
                            <x-adminlte-select2 label="Kelas" name="sel2Basic">
                                <option>Seluruh Kelas</option>
                                <option disabled>Kelas 7A</option>
                                <option selected>Kelas 7B</option>
                            </x-adminlte-select2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                                @php
                                    $configDate = ['format' => 'DD/MM/YYYY'];
                                @endphp
                                <x-adminlte-input-date label="Tanggal Pertemuan" name="idDateOnly" :config="$configDate" placeholder="Choose a date...">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-danger">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>

                            <div clas="col-3">
                                <x-adminlte-button label="Terapkan" data-toggle="modal" data-target="#modalUploadFile" theme="biru-sp-cs" style="margin-top: 32px;margin-right:10px;"/>
                            </div>
                            <div clas="col-3">
                                <a href='{{url("/op-jadwal-pelajaran/add")}}' class="btn btn-biru-sp-cs" label="Tambah Jadwal" theme="biru-sp-cs" style="margin-top: 32px;">
                                Tambah Jadwal
                                </a>
                            </div>
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
            <br />
            <span style="font-size: 20px;font-weight: 700;">Apakah anda yakin ?</span>
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Terima"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>

    <x-adminlte-modal id="modalCustomReject" title="Persetujuan Pengguna" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;text-align:center;">
            <div style="height:100px;margin-top:80px;color:#D81159;">
                <i class="far fa-lg fa-fw fa-question-circle" style="font-size: 100px;"></i>
            </div>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Pengajuan data guru akan ditolak</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Atas Nama Guru 1</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Dengan Email Email 1</span>
            <br />
            <br />
            <br />
            <span style="font-size: 20px;font-weight: 700;">Apakah anda yakin ?</span>
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Tolak"/>
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
            <span style="font-size: 20px;font-weight: 700;">Data guru, akan anda hapus</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Atas Nama Guru 1</span>
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

    <x-adminlte-modal id="modalUploadFile" title="Tambah Data Siswa" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="margin: auto;width: 50%;padding: 10px;text-align:center;">
            <div style="margin-bottom:20px;color:#D81159;">
                <span>Silakan upload data guru yang akan anda tambahkan</span>
                
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
@stop
