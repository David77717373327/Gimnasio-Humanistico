@extends('layouts.Auth')

@section('content')
<div class="login-container">
    <div class="login-background">
        <div class="login-image-container">
            <img class="login-bg-image" src="{{ asset('images/Login_3.jpg') }}" alt="Background">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8">
                <div class="card d-flex mx-auto my-5">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 c1 p-5">
                            <div id="hero" class="bg-transparent h-auto order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                                <img class="img-fluid animated" src="{{ asset('images/Logo_inicio.png') }}" alt="Logo GHM">
                            </div>
                            <div class="row justify-content-center">
                                <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                    <h1 class="wlcm">Welcome</h1>
                                    <span class="sp1">
                                        <span style="margin-right: 2px;" class="px-3 bg-danger rounded-pill"></span>
                                        <span style="margin-right: 2px;" class="ml-2 px-1 rounded-circle"></span>
                                        <span class="ml-2 px-1 rounded-circle"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 c2 px-5 pt-5">
                            <div class="row mb-5 m-3">
                                <div class="institutional-header-with-logo">
                                    <h2 class="institutional-name-with-logo">Gimnasio Humanístico Neiva-Huila</h2>
                                </div>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}" class="px-5 pb-5">
                                @csrf
                                <h3 class="font-weight-bold mb-3">{{ __('Register') }}</h3>
                                
                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="input form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus style="padding: 8px 15px; font-size: 13px;">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <label for="document" class="col-form-label mt-3">{{ __('Document Number') }}</label>
                                <input id="document" type="text" class="input form-control-sm @error('document') is-invalid @enderror" name="document" value="{{ old('document') }}" required style="padding: 8px 15px; font-size: 13px;">
                                @error('document')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <label for="email" class="col-form-label mt-3">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="input form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required style="padding: 8px 15px; font-size: 13px;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <label for="password" class="col-form-label mt-3">{{ __('Password') }}</label>
                                <input id="password" type="password" class="input form-control-sm @error('password') is-invalid @enderror" name="password" required style="padding: 8px 15px; font-size: 13px;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <label for="password_confirmation" class="col-form-label mt-3">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" type="password" class="input form-control-sm @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required style="padding: 8px 15px; font-size: 13px;">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <input type="hidden" name="role" value="student">
                                
                                <div class="mt-4">
                                    <button  style="margin-left: 80px; width: 200px;" type="submit" class="btlogin text-white">Solicitar Usuario</button>
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