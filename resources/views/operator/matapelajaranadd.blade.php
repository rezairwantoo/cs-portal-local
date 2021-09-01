@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Jadwal</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Penugasan Guru dan Mata Pelajaran</h3>
                </div>
                
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-select2 label="Mata Pelajaran" name="sel2Basic">
                                    <option>Bahasa Indonesia</option>
                                    <option disabled>Matematika</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-4">
                                <x-adminlte-select2 label="Tahun Ajaran" name="sel2Basic">
                                    <option>2020-2021</option>
                                    <option disabled>2019-2020</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-4">
                                <x-adminlte-select2 label="Semester" name="sel2Basic">
                                    <option>Genap</option>
                                    <option disabled>Ganjil</option>
                                </x-adminlte-select2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <label>Nilai KKM</label>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Pengetahuan</th>
                                            <th scope="col">Keterampilan</th>
                                            <th scope="col">Sikap</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tingkat 7</td>
                                            <td><x-adminlte-input name="iLabel" label="" placeholder="Nilai KKM" disable-feedback/></td>
                                            <td><x-adminlte-input name="iLabel" label="" placeholder="Nilai KKM" disable-feedback/></td>
                                            <td>
                                                <x-adminlte-select2 label="" name="sel2Basic">
                                                    <option>A</option>
                                                    <option disabled>B</option>
                                                    <option disabled>C</option>
                                                    <option disabled>D</option>
                                                    <option disabled>E</option>
                                                </x-adminlte-select2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tingkat 8</td>
                                            <td><x-adminlte-input name="iLabel" label="" placeholder="Nilai KKM" disable-feedback/></td>
                                            <td><x-adminlte-input name="iLabel" label="" placeholder="Nilai KKM" disable-feedback/></td>
                                            <td>
                                                <x-adminlte-select2 label="" name="sel2Basic">
                                                    <option>A</option>
                                                    <option disabled>B</option>
                                                    <option disabled>C</option>
                                                    <option disabled>D</option>
                                                    <option disabled>E</option>
                                                </x-adminlte-select2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tingkat 9</td>
                                            <td><x-adminlte-input name="iLabel" label="" placeholder="Nilai KKM" disable-feedback/></td>
                                            <td><x-adminlte-input name="iLabel" label="" placeholder="Nilai KKM" disable-feedback/></td>
                                            <td>
                                                <x-adminlte-select2 label="" name="sel2Basic">
                                                    <option>A</option>
                                                    <option disabled>B</option>
                                                    <option disabled>C</option>
                                                    <option disabled>D</option>
                                                    <option disabled>E</option>
                                                </x-adminlte-select2>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-12">
                                <a style="float:right;">+ Tambah pengajar</a>
                            </div>
                        </div>
                        
                        <div class="row">
                        @php
                                $config = [
                                    "placeholder" => "Select multiple options...",
                                    "allowClear" => true,
                                ];
                                @endphp
                            <div class="col-3">
                                <x-adminlte-select2 label="Guru" name="sel2Basic">
                                    <option>Bahasa Indonesia</option>
                                    <option disabled>Matematika</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-3">
                                
                                <x-adminlte-select2 id="tingkat7" name="tingkat7[]" label="Tingkat 7" igroup-size="sm" :config="$config" multiple>
                                    <x-slot name="prependSlot">
                                    </x-slot>
                                    <option>Seluruh Kelas</option>
                                    <option>7A</option>
                                    <option>7B</option>
                                    <option>7C</option>
                                    <option>7D</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-3">
                                <x-adminlte-select2 id="tingkat8" name="tingkat8[]" label="Tingkat 8"
                                    label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                                    <x-slot name="prependSlot">
                                    </x-slot>
                                    <option>Seluruh Kelas</option>
                                    <option>8A</option>
                                    <option>8B</option>
                                    <option>8C</option>
                                    <option>8D</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-3">
                                <x-adminlte-select2 id="tingkat9" name="tingkat9[]" label="Tingkat 9"
                                     igroup-size="sm" :config="$config" multiple>
                                    <x-slot name="prependSlot">
                                    </x-slot>
                                    <option>Seluruh Kelas</option>
                                    <option>9A</option>
                                    <option>9B</option>
                                    <option>9C</option>
                                    <option>9D</option>
                                </x-adminlte-select2>
                            </div>
                        </div>
                        <br />
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
