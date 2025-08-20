@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8">
            <div class="card d-flex mx-auto my-5">
                <div class="row">

                    {{-- Lado izquierdo: Formulario (sin fondo) --}}
                    <div class="col-md-7 register-form">

                        {{-- Flecha de regreso
    <a href="{{ route('login') }}" class="back-arrow">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a> --}}

                        <div class="row mb-5 m-3"> 
                            <a href="#">
                                <img src="{{ asset('images/Logo_tipo.png')}}" width="40%" height="auto" alt="SICEFA">
                            </a> 
                        </div>
                        
                        <h3 class="font-weight-bold mb-3 title">Registrarse</h3>
                        
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            {{-- Documento --}}
                             <div class="mb-3">
                                <label for="document" class="col-form-label">Número de documento</label>
                                <input id="document" type="text" class="form-control input" name="document" required>
                            </div> 

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Correo electrónico</label>
                                <input id="email" type="email" class="form-control input" name="email" required>
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="col-form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control input" name="password" required>
                            </div>

                            <input type="hidden" name="role" value="student">
                            
                            <button type="submit" class="btlogin">Solicitar Usuario</button>
                        </form>
                    </div>

                    {{-- Lado derecho: Ilustración con fondo degradado verde claro --}}
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
