@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Sekolah</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Sekolah</h3>
                </div>
                @if($errors->any())
                    <x-adminlte-callout theme="danger" title-class="text-danger text-uppercase"
                        icon="fas fa-lg fa-exclamation-circle" title="Update Sekolah Gagal">
                        <i>{{$errors->first()}}</i>
                    </x-adminlte-callout>
                    @endif
                
                <div class="card-body">
                    <div class="col-12">
                        <form method="POST" action="{{url('bo-sekolah/edit/'.$refer)}}" class="form-signin" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-input name="name" label="Nama Sekolah" placeholder="Nama Sekolah" value="{{ old('name', $data['name']) }}"/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="npsn" label="NPSN Sekolah" placeholder="NPSN Sekolah" value="{{ old('npsn', $data['npsn']) }}"/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-select2 label="Tingkat Sekolah" name="school_level" value="{{ old('school_level', $data['school_level']) }}">
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                </x-adminlte-select2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-input name="phone" label="Telepon" placeholder="Nama Sekolah" value="{{ old('phone', $data['phone']) }}"/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="school_email" label="Email Sekolah" placeholder="NPSN Sekolah" value="{{ old('school_email', $data['school_email']) }}"/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="owner_email" label="Email Kepala Sekolah" placeholder="NPSN Sekolah" value="{{ old('owner_email', $data['owner_email']) }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <x-adminlte-textarea name="address" rows="5" label="Alamat Sekolah" placeholder="Insert description...">
                                {{ old('address', $data['address']) }}
                                </x-adminlte-textarea>
                            </div>
                        </div>
                        <br />
                        <div class="row" style="float: right;">
                            <x-adminlte-button label="Simpan" type="submit" theme="biru-sp-cs"/>
                        </div>
                        </form>
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
