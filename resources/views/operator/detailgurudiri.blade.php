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
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ url('op-data-guru/detail') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Mata Pelajaran</a>
                        <a href="{{ url('op-data-guru/detail-personal') }}" type="button" class="btn btn-secondary" style="background-color: #0E6BA8">Data Diri</a>
                        <a href="{{ url('op-data-guru/detail-family') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Keluarga</a>
                        <a href="{{ url('op-data-guru/detail') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Data Pendidikan</a>
                        <a href="{{ url('op-data-guru/detail') }}" type="button" class="btn btn-secondary" style="background-color: white; color:#0E6BA8; border:none;">Hak Akses</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="Nama" placeholder="Nama Guru" disable-feedback/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="Gelar" placeholder="Gelar" disable-feedback/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="No Telp / Handphone" placeholder="Nama Guru" disable-feedback/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-select2 label="Jenis Kelamin" name="sel2Basic">
                                    <option>Laki - Laki</option>
                                    <option disabled>Perempuan</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="Tempat Lahir" placeholder="Nama Guru" disable-feedback/>
                            </div>

                            <div class="col-4">
                                @php
                                $config = ['format' => 'DD/MM/YYYY'];
                                @endphp
                                <x-adminlte-input-date label="Tanggal Lahir" name="idDateOnly" :config="$config" placeholder="Choose a date...">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-danger">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="NIK" placeholder="Nik Guru" disable-feedback/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="Nomor Kartu Keluarga" placeholder="No KK Guru" disable-feedback/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="NIP" placeholder="Nip Guru" disable-feedback/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <x-adminlte-textarea name="taBasic" rows="5" label="Alamat" placeholder="Insert description..."/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding:0px">
                                <div class="short-div">
                                    <x-adminlte-select2 label="Status Perkawinan" name="sel2Basic">
                                        <option>Tidak Kawin</option>
                                        <option disabled>Kawin</option>
                                    </x-adminlte-select2>
                                </div>
                                <div class="short-div">
                                    <x-adminlte-select2 label="Provinsi" name="sel2Basic">
                                        <option>Banten</option>
                                        <option disabled>DKI Jakarta</option>
                                    </x-adminlte-select2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-select2 label="Kabupaten / Kota" name="sel2Basic">
                                    <option>Banten</option>
                                    <option disabled>DKI Jakarta</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-4">
                                <x-adminlte-select2 label="Kecamatan" name="sel2Basic">
                                    <option>Banten</option>
                                    <option disabled>DKI Jakarta</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-4">
                                <x-adminlte-select2 label="Kelurahan" name="sel2Basic">
                                    <option>Banten</option>
                                    <option disabled>DKI Jakarta</option>
                                </x-adminlte-select2>
                            </div>
                        </div>
                        <div class="row" style="float: right;">
                            <x-adminlte-button label="Simpan" theme="biru-sp-cs"/>
                        </div>
                    </div>
                    
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
