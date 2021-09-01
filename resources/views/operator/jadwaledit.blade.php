@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Jadwal</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')
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
                    <h3 class="card-title">Ubah Jadwal Pelajaran</h3>
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
                                <x-adminlte-select2 label="Kelas" name="sel2Basic">
                                    <option>7A</option>
                                    <option disabled>7B</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="Pokok Pembahasan" placeholder="Nama Guru" disable-feedback/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                @php
                                $config = ['format' => 'DD/MM/YYYY'];
                                @endphp
                                <x-adminlte-input-date label="Tanggal" name="idDateOnly" :config="$config" placeholder="Choose a date...">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-danger">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>
                            <div class="col-2">
                                <x-adminlte-input name="iLabel" label="Jam Mulai" placeholder="Nama Guru" disable-feedback/>
                            </div>
                            <div class="col-2">
                                <x-adminlte-input name="iLabel" label="Jam Berakhir" placeholder="Nama Guru" disable-feedback/>
                            </div>

                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="link Meet" placeholder="Nama Guru" disable-feedback/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Tanpa Tugas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Tugas Dari Sistem</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">Tugas dengan Link</label>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-adminlte-input name="iLabel" label="Tugas" placeholder="Nama Guru" disable-feedback/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-adminlte-input-date label="Batas Pengumpulan" name="idDateOnly" :config="$config" placeholder="Choose a date...">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-danger">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Tanpa Quiz</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Quiz Dari Sistem</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">Quiz dengan Link</label>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-adminlte-input name="iLabel" label="Quiz" placeholder="Nama Guru" disable-feedback/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-adminlte-input-date label="Batas Pengumpulan" name="idDateOnly" :config="$config" placeholder="Choose a date...">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-danger">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
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

                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="Pokok Pembahasan" placeholder="Nama Guru" disable-feedback/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                @php
                                $config = ['format' => 'DD/MM/YYYY'];
                                @endphp
                                <x-adminlte-input-date label="Tanggal" name="idDateOnly" :config="$config" placeholder="Choose a date...">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-danger">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>
                            <div class="col-2">
                                <x-adminlte-input name="iLabel" label="Jam Mulai" placeholder="Nama Guru" disable-feedback/>
                            </div>
                            <div class="col-2">
                                <x-adminlte-input name="iLabel" label="Jam Berakhir" placeholder="Nama Guru" disable-feedback/>
                            </div>

                            <div class="col-4">
                                <x-adminlte-input name="iLabel" label="link Meet" placeholder="Nama Guru" disable-feedback/>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Tanpa Tugas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Tugas Dari Sistem</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">Tugas dengan Link</label>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-adminlte-input name="iLabel" label="Tugas" placeholder="Nama Guru" disable-feedback/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-adminlte-input-date label="Batas Pengumpulan" name="idDateOnly" :config="$config" placeholder="Choose a date...">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-danger">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Tanpa Quiz</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Quiz Dari Sistem</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">Quiz dengan Link</label>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-adminlte-input name="iLabel" label="Quiz" placeholder="Nama Guru" disable-feedback/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-adminlte-input-date label="Batas Pengumpulan" name="idDateOnly" :config="$config" placeholder="Choose a date...">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-danger">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
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
