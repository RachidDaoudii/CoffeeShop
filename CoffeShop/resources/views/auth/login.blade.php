
@extends('master.app')

@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url({{ asset('FrontEndCoffe/images/bg_3.jpg')}} ); w" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="block-9 ftco-animate">
                <x-guest-layout>
                    <x-jet-authentication-card>
                        <div class="text-center ftco-animate">
                            <h1 class=" bread">Login</h1>
                            <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Login</span></p>
                        </div>
                        <x-slot name="logo">
                            {{-- <img src="{{asset('img/logo.png')}}" alt="logo" width="90px"> --}}
                        </x-slot>
                        <x-jet-validation-errors class="mb-4" />
                
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                
                            <div>
                                <x-jet-label for="email" value="{{ __('Email') }}" class="text-justify" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>
                
                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Password') }}" class="text-justify" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            </div>
                
                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                
                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-white hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                
                                <x-jet-button class="ml-4 bg-yellow-600">
                                    {{ __('Log in') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </x-jet-authentication-card>
                </x-guest-layout>
            </div>
          </div>

      </div>
    </div>
  </div>
</section>

{{-- <section class="ftco-section contact-section">
  <div class="container mt-5">
    
  </div>
</section> --}}


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    
@endsection
