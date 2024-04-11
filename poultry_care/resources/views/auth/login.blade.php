

@extends('layout.layout')
@section('content')
    
<div class="signupform">
 <div class="wrapper">

    <h3 class="text-center" style="font-weight:600"> Welcome back 👋</h3>
    <h4 class="mt-5 text-center" style="font-weight:600">Login</h4>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-box">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-box">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-primary mb-3" href="{{ route('password.request') }}" style="color: blue !important;margin-bottom:10px;">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="btn" style="margin-top: 15px;">
                {{ __('Log in') }}
            </x-primary-button>
            
        </div>
    </form>
    <div class="register-link">
        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
      </div>
</div>
</div>
{{-- <div class="signupform">


    <div class="wrapper">
      <h2>Login</h2>
    
      @if($errors->any())
    
      @foreach ($errors->all() as $item)
          <p style="color: red;">{{$errors}}</p>
      @endforeach
      @endif
    
      
      @if (Session::has('error'))
    
      <p style="color: red"> Incorrect email or password </p>   
      @endif

      <form method="POST" action="{{ route('login') }}">
    
          @csrf
          <div class="input-box">
            <input type="email"  name="email" placeholder="Email" required >
            <i class='bx bxs-envelope'></i>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt' ></i>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox">Remember Me</label>
            <a href="">Forgot Password</a>
          </div>
          <input type="submit" value="Login" class="btn">
          <div class="register-link">
            <p>Don't have an account? <a href="">Register</a></p>
          </div>
        </form>
    
      </div>
    
    
     </div> --}}
    
@endsection

