@extends('public.layouts.default')
@section('content')
    <section>
        <div class="flex min-h-screen justify-center bg-cover bg-center md:justify-start"
            style="background-image: url({{ asset('img/home.jpeg') }})">
            <form method="POST" action="/register"
                class="flex flex-col justify-center bg-stone-900 bg-opacity-80 p-6 text-center xl:p-24">
                <h1 class="mb-7 text-center text-8xl">Nieuwe Klant</h1>
                @csrf
                <div class="form-control flex justify-center">
                    <label class="label">
                        <span class="label-text">Naam:</span>
                    </label>
                    <input type="text" class="input input-bordered" name="name" />
                    <label class="label">
                        <span class="label-text">Email:</span>
                    </label>
                    <input type="email" class="input input-bordered" name="email" />
                    <label class="label">
                        <span class="label-text">Telefoon:</span>
                    </label>
                    <input type="telephone" class="input input-bordered" name="telephone" />
                    <label class="label">
                        <span class="label-text">Wachtwoord:</span>
                    </label>
                    <input type="password" class="input input-bordered" name="password" />
                </div>
                <button type="submit" class="btn btn-primary mt-10">Aanmelden</button>
            </form>
        </div>
    </section>
    {{-- <section>
        <div class="mt-20 py-5">
            <p class="ml-20 text-[20px]">Nieuwe Gebruiker</p>
            <form method="POST" action="/register">
                @csrf
                <div class="form-group ml-5 py-5">
                    <label for="name">Naam:</label>
                    <input type="text" class="form-control" id="name">
                </div>

                <div class="form-group ml-5 py-5">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group ml-5 py-5">
                    <label for="telephone">Telefoon:</label>
                    <input type="telephone" class="form-control" id="telephone" name="telephone">
                </div>

                <div class="form-group ml-5 py-5">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group ml-20 py-5">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Aanmelden</button>
                </div>


            </form>
        </div>
    </section> --}}
@endsection
