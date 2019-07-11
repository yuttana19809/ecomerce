@extends('admin.layouts.auth')

@section('title', 'เข้าสู่ระบบ')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4">
            <div class="card-body">
                <form method="POST" action="{{ action('Admin\LoginController@login') }}">
                    @csrf

                    <h1>{{ __('Login') }}</h1>
                    <p class="text-muted">{{ __('Sign In to your account') }}</p>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-envelope"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="off" autofocus
                            placeholder="{{ __('E-Mail Address') }}">

                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-lock"></i></span>
                        </div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="off" placeholder="{{ __('Password') }}">

                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fa fa-dot-circle-o"></i> {{ __('Login') }}
                            </button>
                        </div>

                        @if (Route::has('admin.password.request'))
                        <div class="col-6 text-right">
                            <a class="btn btn-link px-0"
                                href="{{ route('admin.password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
            <!--/.card-body-->
        </div>
        <!--/.card-->
    </div>
    <!--/.col-->
</div>
<!--/.row-->
@endsection

@section('styles')
@parent
@endsection

@section('scripts')
@parent
@endsection