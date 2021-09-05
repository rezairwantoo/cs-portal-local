@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
@section('content_header')
    <h1 class="m-0 text-dark">Daftar Pengguna</h1>
@stop
<?php $totalSiswa = 100;?>
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Pengguna</h3>
                </div>
                @if($errors->any())
                    <x-adminlte-callout theme="danger" title-class="text-danger text-uppercase"
                        icon="fas fa-lg fa-exclamation-circle" title="Tambah Sekolah Gagal">
                        <i>{{$errors->first()}}</i>
                    </x-adminlte-callout>
                    @endif
                
                <div class="card-body">
                    <div class="col-12">
                        <form method="POST" action="{{url('bo-user/add')}}" class="form-signin" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-select2 label="Tipe Pengguna" name="user_type" value="{{ old('user_type') }}">
                                    <option value="teacher">Guru</option>
                                    <option value="operator">Operator</option>
                                </x-adminlte-select2>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="username" label="Username" placeholder="Username" value="{{ old('username') }}"/>
                            </div>
                            <div class="col-4">
                                <x-adminlte-input name="email" type="email" label="Email" placeholder="Email" value="{{ old('email') }}"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <x-adminlte-select2 label="Sekolah" name="school_id" value="{{ old('school_level') }}">
                                @foreach ($dataSekolah as $sekolah)
                                    <option value="{{$sekolah['id']}}">{{$sekolah['name']}}</option>
                                @endforeach
                                </x-adminlte-select2>
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
