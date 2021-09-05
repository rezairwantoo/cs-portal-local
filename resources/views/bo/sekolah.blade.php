@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Daftar Sekolah</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')

    @php
    $heads = [
        ['label' => 'Nama Sekolah', 'width' => 20],
        ['label' => 'NPSN', 'width' => 20],
        ['label' => 'Tingkat Sekolah', 'width' => 10],
        ['label' => 'Tipe Sekolah', 'width' => 10],
        ['label' => 'Email Sekolah', 'width' => 10],
        ['label' => 'Email Kepala Sekolah', 'width' => 10],
        ['label' => 'Alamat', 'width' => 10],
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
        'order' => [],
        'columns' => [["data"=> "name"],["data"=> "npsn"], ["data"=> "school_level"], ["data"=> "school_type"], ["data"=> "school_email"], ["data"=> "owner_email"],["data"=> "address"]],
        "serverSide"=> true,
        "ajax"=> "bo-sekolah/list",
        "Processing"=> true,
    ];
    $config["lengthMenu"] = [ 10, 50, 100, 500];

    
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Sekolah</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <a href="{{url('bo-sekolah/add')}}" class="btn btn-biru-sp-cs" label="Tambah Jadwal" theme="biru-sp-cs" >
                            Tambah Sekolah
                        </a>
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table id="table2" :heads="$heads" :config="$config" theme="light" class="table table-hover table-striped table-light dataTable no-footer"  style="width:100%">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Nama Sekolah</th>
                            <th>NPSN</th>
                            <th>Tingkat Sekolah</th>
                            <th>Tipe Sekolah</th>
                            <th>Email Sekolah</th>
                            <th>Email Kepala Sekolah</th>
                            <th>Alamat</th>
                            <th></th>
                            </tr>
                        </thead>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <x-adminlte-modal id="modalAddMataPelajaran" title="Tambah Data Mata Pelajaran" size="lg" theme="biru-sp-cs"
        icon="" v-centered static-backdrop scrollable>
        <div style="height:400px;margin: auto;width: 50%;padding: 10px;">
            <div class="row">
                <div class="col-12">
                    <x-adminlte-input name="iLabel" label="Nama Kelas" placeholder="Nama" disable-feedback/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-select2 label="Wali Kelas" name="sel2Basic">
                        <option>Guru 1</option>
                        <option disabled>Guru 2</option>
                    </x-adminlte-select2>
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
@stop

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table2').DataTable({
                "Processing": true,
                "lengthMenu": [10,20,50,100],
                "serverSide": true,
                "paging": true,
                "ajax": {
                "url": "bo-sekolah/list"
                },
                "columns": [
                { "data": "index",'orderable': false },
                { "data": "name", 'orderable': false },
                { "data": "npsn", 'orderable': false },
                { "data": "school_level" , 'orderable': false},
                { "data": "school_type",'orderable': false },
                { "data": "school_email",'orderable': false },
                { "data": "owner_email", 'orderable': false },
                { "data": "address",'orderable': false },
                { "data": "action", 'orderable': false },
                ]
                });
            });
    </script>
@endpush