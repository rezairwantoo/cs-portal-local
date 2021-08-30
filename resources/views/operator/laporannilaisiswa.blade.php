@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Laporan Nilai Siswa</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')

    @php
    $heads = [
        ['label' => '#', 'width' => 5],
        'NISN',
        ['label' => 'Nama Siswa', 'width' => 40],
        ['label' => 'Kelas', 'width' => 40],
    ];

    $headsDetail = [
        ['label' => '#', 'width' => 5],
        'Kelas',
        ['label' => 'Semester'],
        ['label' => 'Total Pengetahuan'],
        ['label' => 'Total Keterampilan'],
        ['label' => 'Total Nilai'],
        ['label' => 'Rata - Rata Nilai'],
    ];

    $url = url("/op-data-guru/detail");
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
            [1, '1234546654', 'Nama Siswa 1', '7A' ],
            [2, '1234546654', 'Nama Siswa 2', '7A' ],
            [3, '1234546654', 'Nama Siswa 3', '7A' ],
            [4, '1234546654', 'Nama Siswa 4', '7A' ],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];

    $configDetail = [
        'data' => [
            [1, '7A', 'Ganjil', '1290', '1290', '1290', '90' ],
            [2, '7A', 'Genap',  '1290', '1290', '1290', '90' ],
            [3, '7B', 'Ganjil', '1290', '1290', '1290', '90' ],
            [4, '7B', 'Genap',  '1290', '1290', '1290', '90' ],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null,null, null, null, ['orderable' => false]],
    ];
    $configDetail["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Siswa</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <x-adminlte-select2 label="Kelas" name="sel2Basic">
                                <option>Seluruh Kelas</option>
                                <option disabled>Kelas 7A</option>
                                <option selected>Kelas 7B</option>
                            </x-adminlte-select2>
                        </div>

                        <div clas="col-3">
                            <x-adminlte-button label="Terapkan" data-toggle="modal" data-target="#modalUploadFile" theme="biru-sp-cs" style="margin-top: 32px;"/>
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

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail Laporan Nilai Siswa</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <x-adminlte-select2 label="Kelas" name="sel2Basic">
                                <option>Seluruh Kelas</option>
                                <option disabled>Kelas 7A</option>
                                <option selected>Kelas 7B</option>
                            </x-adminlte-select2>
                        </div>
                        
                        <div class="col-3">
                            <x-adminlte-select2 label="Semester" name="sel2Basic">
                                <option disabled>Ganjil</option>
                                <option selected>Genap</option>
                            </x-adminlte-select2>
                        </div>

                        <div clas="col-3">
                            <x-adminlte-button label="Terapkan" data-toggle="modal" data-target="#modalUploadFile" theme="biru-sp-cs" style="margin-top: 32px;"/>
                        </div>
                    </div>
                    
                    <br />
                    <x-adminlte-datatable id="table3" :heads="$headsDetail" :config="$configDetail" theme="light" striped hoverable>
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
