@extends('layouts.app')

@section('content')

<div class="cls-content">
    <div class="cls-content-sm panel">
        <div class="card-header">
            <img  class="img-responsive" src="{{ asset('assets/img/logo-white.png') }}" alt="">
        </div>
        <div class="panel-body text-center">
            <div class="mar-ver pad-btm">
                <h2 class="h2">Iniciar sesión</h4>
                <hr>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"                   
                    required autocomplete="email" placeholder="Correo electrónico" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"                     
                    required autocomplete="current-password" placeholder="Contraseña" >

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               
                <button class="btn btn-login-sd btn-lg btn-block text-uppercase" type="submit">Ingresar</button>
            </form>
        </div>

      
    </div>
</div>

{{-- <div class="container border">


    <div class="row mb-12 justify-content-center">

        <div class="col-md-8 " >
            <div class="card ">
                <div class="card-header">
                    <img  style=" height: 40px; width: 160px;" src="{{ asset('assets/img/curved-images/LOGO.png') }}" alt="">
                </div>

                <div class="card-body">
                    <p class="login-box-msg">Inicia sesión</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Usuario</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" 
                                style="border-color:#003846 !important; box-shadow: none;"
                                required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
                                style="border-color:#003846 !important; box-shadow: none;"
                                required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"
                                style="--bs-btn-bg: #003846 !important; ">
                                    Entrar
                                </button>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div> --}}
@endsection
