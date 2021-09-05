@extends('layout.loginnew')

@section('content')
<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-4 mx-auto my-auto" style="
        margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
    ">
        <div class="card card-signin" style="border: none;">
            <div class="card-body">
                <div style="display: flex; justify-content: center;">
                    <img src="{{ asset('image/logo-login.png') }}" style="width:200px; height:100px;"></img>
                </div>
                <br />
                <h5 class="card-title text-center" style="color: #0077B6">Masukan Password Login Anda </h5>
                @if($errors->any())
                    <x-adminlte-callout theme="danger" title-class="text-danger text-uppercase"
                        icon="fas fa-lg fa-exclamation-circle" title="Login Pengguna Gagal">
                        <i>{{$errors->first()}}</i>
                    </x-adminlte-callout>
                    @endif
                <form method="POST" action="{{url('bo-new-user/set-password')}}" class="form-signin" autocomplete="off">
                    @csrf
                    <input id="dpen" type="hidden" class="form-control" name="dpen" value="{{ $datapengguna['id'] }}" placeholder="{{ __('Masukan Password Anda') }}" autofocus>
                    <div class="form-label-group">
                        <input id="password" type="text" class="form-control" name="password" placeholder="{{ __('Masukan Password Anda') }}" required>
                    </div>
                    <br />

                    <div class="form-label-group">
                        <input id="password_confirmation" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="{{ __('Masukan Kembali Password Anda') }}" required>
                        <span id="pass-notif" style="display: none; color:red">
                            Password Tidak Sama
                        </span>
                        <span id="pass-notif-succ" style="display: none; color:green">
                            Password Sesuai
                        </span>
                    </div>
                    <br />

                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block" style="background-color: #4CA1A3;border-color: #4CA1A3;">
                                {{ __('Proses') }}
                            </button>
                        </div>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        // alert($('#password').val());
        $('#password_confirmation').on('keyup change', function() {
            var password = $('#password').val();
            if (password != "") {
                if (password != this.value) {
                    $('#pass-notif').show();
                    $('#pass-notif-succ').hide();
                } else {
                    $('#pass-notif-succ').show();
                    $('#pass-notif').hide();
                }
            } else {
                $('#pass-notif').hide();
                $('#pass-notif-succ').hide();
            }
            
        });

        $('#password').on('keyup change', function() {
            var password = $('#password_confirmation').val();
            if (password != "") {
                if (password != this.value) {
                    $('#pass-notif').show();
                    $('#pass-notif-succ').hide();
                } else {
                    $('#pass-notif-succ').show();
                    $('#pass-notif').hide();
                }
            } else {
                $('#pass-notif').hide();
                $('#pass-notif-succ').hide();
            }
            
        });
    </script>
@endpush