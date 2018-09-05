@extends('layouts.auth')

@section('content')
        <div class="login-box card">
                <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        <h3 class="box-title m-b-20">{{ __('Login') }}</h3>
                        @csrf

                        <div class="form-group">
                            <div class="col-md-12"></div>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                         <div class="form-group">
                            <div class="col-md-12"></div>
                                 <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
                                    <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> {{ __('Forgot Password?') }}</a> 
                                </div> 
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-rounded btn-block btn-primary" type="submit">{{ __('Login') }}</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Belum punya? <a href="{{ route('register') }}" class="text-info m-l-5"><b>{{ __('Register') }}</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
