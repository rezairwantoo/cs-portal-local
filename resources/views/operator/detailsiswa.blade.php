@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Data Siswa</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')
    <div class="row">
        <div class="col-12">
        <x-adminlte-profile-widget name="John Doe" desc="123213213232" theme="biru-sp-cs"
                    img="https://picsum.photos/id/1/100">
                    <x-adminlte-profile-col-item title="" text="" url=""/>
                    <x-adminlte-profile-col-item title="Kelas" text="7A"/>
                    <x-adminlte-profile-col-item title="" text="" />
                </x-adminlte-profile-widget>
        </div>
    </div>

    @php
    $heads = [
        ['label' => '#', 'width' => 5],
        ['label' => 'Tahun Ajaran', 'width' => 20],
        ['label' => 'Semester', 'width' => 20],
        ['label' => 'Nama Wali Kelas', 'width' => 40],
        ['label' => 'Kelas', 'width' => 10],
    ];

    $btnEdit = '<button class="btn btn-xs text-primary" data-toggle="modal" data-target="#modalEditKelas" title="Edit">
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
            [1, '2020/2021', 'Ganjil', 'Wali kelas', '7A', '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            [2, '2020/2021', 'Ganjil', 'Wali kelas', '7B', '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
            [3, '2020/2021', 'Genap', 'Wali kelas', '7C', '<nobr>'.$btnEdit.$btnDelete.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false], ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('op-data-siswa/detail') }}" type="button" class="btn btn-secondary" style="background-color: #0E6BA8">Kelas</a>
                        <a href="{{ url('op-data-siswa/detail-diri') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Diri</a>
                        <a href="{{ url('op-data-siswa/detail-family') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Keluarga</a>
                        <a href="{{ url('op-data-siswa/detail-study') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Pendidikan</a>
                        <a href="{{ url('op-data-siswa/detail') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Hak Akses</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div clas="col-4">
                        <x-adminlte-button label="Set Siswa Di Kelas" data-toggle="modal" data-target="#modalSetKelas" theme="biru-sp-cs"/>
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
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Terima"/>
            <x-adminlte-button theme="danger" label="Tolak" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>

    <x-adminlte-modal id="modalCustomDelete" title="Hapus Data Guru" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;text-align:center;">
            <div style="height:100px;margin-top:80px;color:#D81159;">
                <i class="far fa-lg fa-fw fa-question-circle" style="font-size: 100px;"></i>
            </div>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Data Kelas, akan anda hapus</span>
            <br />
            <span style="font-size: 20px;font-weight: 700;">Apakah anda yakin ?</span>
            
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Hapus"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>

    <x-adminlte-modal id="modalEditKelas" title="Ubah Data Kelas" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;">
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Nama" placeholder="Nama" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Tahun Ajaran" name="sel2Basic">
                        <option>2021-2022</option>
                        <option disabled>2020-2021</option>
                        <option>2019-2020</option>
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Semester" name="sel2Basic">
                        <option>Ganjil</option>
                        <option disabled>Genap</option>
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Kelas" name="sel2Basic">
                        <option>7A</option>
                        <option disabled>7B</option>
                        <option>7C</option>
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Wali Kelas" placeholder="Wali Kelas" readonly disable-feedback/>
                </div>
            </div>
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Simpan"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>

    <x-adminlte-modal id="modalSetKelas" title="Set Data Kelas" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;">
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Nama" placeholder="Nama" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Tahun Ajaran" name="sel2Basic">
                        <option>2021-2022</option>
                        <option disabled>2020-2021</option>
                        <option>2019-2020</option>
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Semester" name="sel2Basic">
                        <option>Ganjil</option>
                        <option disabled>Genap</option>
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Kelas" name="sel2Basic">
                        <option>7A</option>
                        <option disabled>7B</option>
                        <option>7C</option>
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Wali Kelas" placeholder="Wali Kelas" readonly disable-feedback/>
                </div>
            </div>
        </div>

        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Simpan"/>
            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
@stop
