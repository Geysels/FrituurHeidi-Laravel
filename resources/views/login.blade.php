@extends('public.layouts.default')
@section('content')
    <div class="flex min-h-screen justify-center bg-cover bg-center md:justify-start"
        style="background-image: url({{ asset('img/home.jpeg') }})">
        <div class="flex flex-col justify-center bg-stone-900 bg-opacity-80 p-6 text-center xl:p-24">
            <form method="POST" action="{{ route('voyager.login') }}">
                @csrf

                <h1 class="mb-7 text-center text-8xl">Log In</h1>
                @csrf
                <div class="form-control flex justify-center">
                    <label class="label">
                        <span class="label-text">E-mail:</span>
                    </label>
                    <input type="text" class="input input-bordered" name="email" id="email" />

                    <label class="label">
                        <span class="label-text">Wachtwoord:</span>
                    </label>
                    <input type="password" class="input input-bordered" name="password" />
                    {{-- <div class="form-group" id="rememberMeGroup">
                        <div class="controls">
                            <input type="checkbox" name="remember" id="remember" value="1"><label for="remember"
                                class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                        </div>
                    </div> --}}
                </div>
                <button type="submit" class="btn btn-primary mt-10">Inloggen</button>

            </form>
            <a href="{{ route('register') }}">
                <button class="btn btn-primary mt-10">Register</button>
            </a>
        </div>


    </div> <!-- .login-container -->
@endsection
