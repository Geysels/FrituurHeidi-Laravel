@extends('public.layouts.default')
@section('content')
    <section>
<div class="mt-20 py-5">
    <p class="text-[20px] ml-20">Register</p>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group ml-5 py-5">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
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
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group ml-20 py-5">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>
    </div>
    </section>

@endsection 
 
 
