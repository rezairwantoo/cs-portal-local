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
                <h5 class="card-title text-center" style="color: #0077B6">Login Portal </h5>
                <form method="POST" action="#" class="form-signin" autocomplete="off">
                    @csrf

                    <div class="form-label-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Masukan Email address') }}" autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <br />

                    <div class="form-label-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Masukan Password') }}">
                        

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-muted" href="{{ route('lupa-password') }}">
                                {{ __('Lupa password?') }}
                            </a>
                            @endif
                    </div>
                    <br />

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
