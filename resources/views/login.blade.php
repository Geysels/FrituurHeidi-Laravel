@extends('public.layouts.default')
@section('content')
    <section>
        <div class="flex min-h-screen justify-center bg-cover bg-center md:justify-end"
            style="background-image: url({{ asset('img/bestellen.jpeg') }})">
            <div class="flex w-screen flex-col justify-center bg-stone-900 bg-opacity-80 p-6 text-center md:w-2/4 xl:p-48">
                <form method="POST" action="{{ route('voyager.login') }}">
                    @csrf
                    <h1 class="mb-7 text-center text-8xl">Log In</h1>
                    <div class="form-control flex justify-center">
                        <label class="label">
                            <span class="label-text">E-mail:</span>
                        </label>
                        <input type="text" class="input input-bordered" name="email" id="email" />
                        <label class="label">
                            <span class="label-text">Wachtwoord:</span>
                        </label>
                        <input type="password" class="input input-bordered" name="password" />
                        <div class="form-group" id="rememberMeGroup">
                            <div class="controls">
                                <input type="checkbox" name="remember" id="remember" value="1"><label for="remember"
                                    class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-10 w-48">Inloggen</button>
                </form>
                <a href="{{ route('register') }}">
                    <button class="btn btn-accent mt-2 w-48">Aanmelden</button>
                </a>
            </div>
        </div>
    </section>
@endsection
