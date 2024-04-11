
    @extends('layout.layout')

    @section('content')
        
    
    <div class="signupform">
      
        <div class="wrapper">
    <h3> Create Account</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="input-box">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="input-box">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-box">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="input-box">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="mt-3 text-primary" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 btn">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </div>

    @endsection

{{-- 
    <div class="signupform">


        <div class="wrapper">
          <h2>Register</h2>
        
          @if($errors->any())
        
          @foreach ($errors->all() as $item)
              <p style="color: red;">{{$item}}</p>
          @endforeach
          @endif
            <form action="{{route('studentregister')}}" method="POST" >
        
              @csrf
            
              <div class="input-box">
                <input type="text" name="name"  placeholder="Username" required>
                <i class='bx bxs-user'></i>
              </div>
              <div class="input-box">
                <input type="email"  name="email" placeholder="Email" required >
                <i class='bx bxs-envelope'></i>
              </div>
              <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
              </div>
              <div class="input-box">
                <input type="password" name= "password_confirmation" placeholder="confirm password" required>
                <i class='bx bxs-lock-alt' ></i>
              </div>
              <input type="submit" value="register" class="btn">
              <div class="register-link">
                <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
              </div>
            </form>
        
            @if (Session::has('success'))
        
            <p style="color: green;"> {{Session::has('success')}} </p>   
            @endif
          </div>
        
        
         </div> --}}