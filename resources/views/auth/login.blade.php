@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8">
            <div class="card d-flex mx-auto my-5">
                <div class="row">
                    {{-- Lado izquierdo con imagen --}}
                    <div class="col-md-5 col-sm-12 col-xs-12 c1 p-5">
                        <div id="hero" class="bg-transparent h-auto order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                            <img class="img-fluid animated"
                                 src="{{ asset('images/Logo_inicio.png') }}"
                                 alt="">
                        </div>
                        <div class="row justify-content-center">
                            <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                <h1>Welcome</h1>
                                <span class="sp1">
                                    <span style="margin-right: 2px;" class="px-3 bg-danger rounded-pill"></span>
                                    <span style="margin-right: 2px;"  class="ml-2 px-1 rounded-circle"></span>
                                    <span class="ml-2 px-1 rounded-circle"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Lado derecho con login --}}
                    <div class="col-md-7 col-sm-12 col-xs-12 c2 px-5 pt-5">
                        <div class="row mb-5 m-3"> 
                            <a href="#">
                                <img src="{{ asset('images/Logo_tipo.png')}}" width="40%" height="auto" alt="">
                            </a> 
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="px-5 pb-5">
                            @csrf
                            <h3 class="font-weight-bold mb-3">{{ __('Login') }}</h3>
                            {{-- EMAIL --}}
                            <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="text"
                                class="input @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            {{-- PASSWORD --}}
                            <label for="password" class="col-form-label mt-3">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="input @error('password') is-invalid @enderror"
                                name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            {{-- BOTONES --}}
                            <div class="mt-4">
                                <button type="submit" class="btlogin text-white">Login</button>
                                <a href="{{ route('register') }}" class="btlogin text-white">Registrarse</a>
                            </div>

                            {{-- LINK OLVIDASTE PASSWORD --}}
                            <a class="btn btn-link forgot mt-2" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
