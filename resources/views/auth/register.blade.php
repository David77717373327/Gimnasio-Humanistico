@extends('layouts.Auth')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8">
            <div class="card d-flex mx-auto my-5">
                <div class="row">
                    <div class="col-md-7 register-form">
                        <div class="row mb-5 m-3"> 
                            <a href="#">
                                <img src="{{ asset('images/Logo_tipo.png')}}" width="40%" height="auto" alt="SICEFA">
                            </a> 
                        </div>
                        
                        <h3 class="font-weight-bold mb-3 title">Registrarse</h3>
                        
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

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="col-form-label">Nombre</label>
                                <input id="name" type="text" class="form-control input" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="document" class="col-form-label">Número de documento</label>
                                <input id="document" type="text" class="form-control input" name="document" value="{{ old('document') }}" required>
                                @error('document')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 

                            <div class="mb-3">
                                <label for="email" class="col-form-label">Correo electrónico</label>
                                <input id="email" type="email" class="form-control input" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="col-form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control input" name="password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="col-form-label">Confirmar Contraseña</label>
                                <input id="password_confirmation" type="password" class="form-control input" name="password_confirmation" required>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" name="role" value="student">
                            
                            <button type="submit" class="btlogin">Solicitar Usuario</button>
                        </form>
                    </div>

                    <div class="col-md-5 c1 p-5">
                        <div id="hero" class="bg-transparent h-auto">
                            <img src="{{ asset('images/Logo_inicio.png') }}" class="img-fluid animated" alt="Registro">
                        </div>
                        <div class="row justify-content-center">
                            <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                <h1 class="wlcm">{{ __('Welcome') }}</h1>
                                <span class="sp1">
                                    <span style="margin-right: 2px;" class="px-3 "></span>
                                    <span style="margin-right: 2px;" class="ml-2 px-1 rounded-circle"></span>
                                    <span class="ml-2 px-1 rounded-circle"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection