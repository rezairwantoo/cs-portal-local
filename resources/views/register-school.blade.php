@extends('layout.loginnew')

@section('content')
<div class="row">
    <div class="mx-auto" style="width: 750px;">
        <div class="card card-signin" style="border: none;">
            <div class="card-body">
                <div style="display: flex; justify-content: center;">
                    <img src="{{ asset('image/logo-login.png') }}" style="width:200px; height:100px;"></img>
                </div>
                <br />
                <h5 class="card-title text-center" style="color: #0077B6">Register Sekolah </h5>
                <form method="POST" action="#" class="form-signin" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NPSN</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NPSN Sekolah">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Sekolah</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Sekolah">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tingkat Sekolah</label>
                                <select id="level-school" class="form-control" id="exampleFormControlSelect1">
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option value="SMA">SMA / SMK</option>
                                </select> 
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status Sekolah</label>
                                <select id="level-school" class="form-control" id="exampleFormControlSelect1">
                                    <option>Negeri</option>
                                    <option>Swasta</option>
                                </select> 
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NPSN Sekolah">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Kepala Sekolah</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Sekolah">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telp Sekolah</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Telp Sekolah">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                        <div class="col-6">
                        <label for="exampleInputEmail1">Logo Sekolah</label>
                                          <div class="custom-file">
                                            <input id="logo-school" type="file" class="custom-file-input" id="validatedCustomFile">
                                            <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Provinsi</label>
                                <select id="level-school" class="form-control" id="exampleFormControlSelect1">
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option value="SMA">SMA / SMK</option>
                                </select> 
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kabupaten / Kota</label>
                                <select id="level-school" class="form-control" id="exampleFormControlSelect1">
                                    <option>Negeri</option>
                                    <option>Swasta</option>
                                </select> 
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kecamatan</label>
                                <select id="level-school" class="form-control" id="exampleFormControlSelect1">
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option value="SMA">SMA / SMK</option>
                                </select> 
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelurahan / Desa</label>
                                <select id="level-school" class="form-control" id="exampleFormControlSelect1">
                                    <option>Negeri</option>
                                    <option>Swasta</option>
                                </select> 
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block" style="background-color: #4CA1A3;border-color: #4CA1A3;">
                                {{ __('Masuk') }}
                            </button>
                        </div>
                        <div class="input-group">
                            <a class="btn btn-lg btn-primary btn-block" style="background-color: #D81159;border-color: #D81159;">
                                {{ __('Daftar') }}
                            </a>
                            <br />
                            
                        </div>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
