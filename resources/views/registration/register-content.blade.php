@extends('public.layouts.default')
@section('content')
    <section>
        <div class="flex min-h-screen justify-center bg-cover bg-center md:justify-start"
            style="background-image: url({{ asset('img/home.jpeg') }})">
            <form method="POST" action="/register" autocomplete="off"
                class="flex flex-col justify-center bg-stone-900 bg-opacity-80 p-6 text-center xl:p-24">
                <h1 class="mb-7 text-center text-8xl">Nieuwe Klant</h1>
                @csrf
                <div class="form-control flex justify-center">
                    <label class="label">
                        <span class="label-text">Naam:</span>
                    </label>
                    <input autocomplete="false" type="text" class="input input-bordered" name="name" required />
                    <label class="label">
                        <span class="label-text">Email:</span>
                    </label>
                    <input autocomplete="false" type="email" class="input input-bordered" name="email" required />
                    <label class="label">
                        <span class="label-text">Telefoon:</span>
                    </label>
                    <input autocomplete="false" type="telephone" class="input input-bordered" name="telephone" required />
                    <label class="label">
                        <span class="label-text">Wachtwoord:</span>
                    </label>
                    <input autocomplete="new-password" type="password" class="input input-bordered" name="password"
                        required />
                </div>
                <button type="submit" class="btn btn-primary mt-10">Aanmelden</button>
            </form>
        </div>
    </section>
@endsection
