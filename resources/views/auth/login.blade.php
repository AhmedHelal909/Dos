@extends('layouts.app')

@section('content')
<div class="account-pages">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <div>
                <div >
                    <a href="#" class="logo logo-admin"><img src="{{ asset('assets/images/logo_dark.png') }}" height="28" alt="logo"></a>
                </div>
                <h5 class="font-14 text-muted mb-4">Responsive Bootstrap 4 Admin Dashboard</h5>
                <p class="text-muted mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>

                <h5 class="font-14 text-muted mb-4">Terms :</h5>
                <div>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>At solmen va esser necessi far uniform paroles.</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Donec sapien ut libero venenatis faucibus.</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i>Nemo enim ipsam voluptatem quia voluptas sit .</p>
                </div>
            </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
            <div class="card mb-0">
                {{-- <div class="card-header">{{ $title ?? "" }} {{ __('Login') }}</div> --}}

                <div class="card-body">
                    <div class="p-2">
                        <h4 class="text-muted float-right font-18 mt-4">Sign In</h4>
                        <div>
                            <a href="#" class="logo logo-admin"><img src="{{ asset('assets/images/logo_dark.png') }}" height="28" alt="logo"></a>
                        </div>
                    </div>
                    <div class="p-2">
                    @isset($route)
                        <form method="POST" action="{{ $route }}" class="form-horizontal m-t-20" >
                    @else
                    @if(Route::is('pharmacy.login-view'))
                        <form  class="form-horizontal m-t-20" method="POST" action="{{  route('pharmacy.login') }}">
                    @elseif(Route::is('delivery.login-view'))
                            <form  class="form-horizontal m-t-20" method="POST" action="{{  route('delivery.login') }}">
                    @elseif(Route::is('login'))
                    <form  class="form-horizontal m-t-20" method="POST" action="{{  route('login') }}">

                    @endif
                    @endisset

                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
