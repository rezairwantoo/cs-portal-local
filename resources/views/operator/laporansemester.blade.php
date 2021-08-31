@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Laporan Nilai Siswa</h1>
@stop
@section('content')
    @php
        $url = url("/op-laporan-nilai-siswa/harian-siswa");
    @endphp
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

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nilai Raport 2020-2021 Semester Genap</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Nilai Pengetahuan</th>
                                    <th scope="col">Nilai Keterampilan</th>
                                    <th scope="col">Rata - Rata Nilai</th>
                                    <th scope="col" style="width: 25%">Catatan Guru</th>
                                    <th scope="col">Kehadiran</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bahasa Indonesia</td>
                                    <td>90</td>
                                    <td>90</td>
                                    <td>90</td>
                                    <td>catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru </td>
                                    <td>12 dari 12</td>
                                    <td>
                                        <a href='{{url("/op-laporan-nilai-siswa/harian-siswa")}}' class="btn btn-xs text-teal" title="Details">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Bahasa Indonesia</td>
                                    <td>90</td>
                                    <td>90</td>
                                    <td>90</td>
                                    <td>catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru </td>
                                    <td>12 dari 12</td>
                                    <td>
                                        <a href='{{url("/op-laporan-nilai-siswa/harian-siswa")}}' class="btn btn-xs text-teal" title="Details">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Bahasa Indonesia</td>
                                    <td>90</td>
                                    <td>90</td>
                                    <td>90</td>
                                    <td>catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru catatan guru </td>
                                    <td>12 dari 12</td>
                                    <td>
                                        <a href='{{url("/op-laporan-nilai-siswa/harian-siswa")}}' class="btn btn-xs text-teal" title="Details">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Total Nilai</td>
                                    <td>90</td>
                                    <td>90</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Rata - Rata</td>
                                    <td>90</td>
                                    <td>90</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br />
                    <br />
                    <h3>Kehadiran Siswa</h3>
                    <div class="row">
                        
                        <div class="col-6">
                        <br />
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Sakit</th>
                                        <th scope="col">Izin</th>
                                        <th scope="col">Tanpa Keterangan</th>
                                        <th scope="col">Total Jadwal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0</td>
                                        <td>9</td>
                                        <td>0</td>
                                        <td>90</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-6">
                            <label for="exampleFormControlTextarea1">Catatan Walikelas</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
