@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
=======
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card p-0">

>>>>>>> old-repo/master
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
=======
                    <form class="login-form" method="POST" action="{{ route('password.email') }}" style="padding: 28px;margin: 20% 0;">
                        <div class="logo text-center">
                            <div class="login-heading" style="font-size: 27px; font-weight: 700; color: #525151;">{{ __('Reset Password') }}</div>
                            <img src="https://crmcargoconvoy.co/Cargo-icon.png" alt="" id="login-logo" style="width:50%;">
                        </div>
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-12">
                                 <label for="email"><b>{{ __('Email Address') }}</b></label>
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" for="email"><i class="fa fa-user"></i></span>
                                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                       @error('email')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                 </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
>>>>>>> old-repo/master
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
<<<<<<< HEAD
                </div>
=======
>>>>>>> old-repo/master
            </div>
        </div>
    </div>
</div>
@endsection
