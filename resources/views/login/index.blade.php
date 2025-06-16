@extends('layouts.third')

@section('container')
<div class="row justify-content-center align-item-center">
    <div class="col-lg-5">
        <main class="form-signin w-100 m-auto">

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="d-flex justify-content-center">
                <img class="mb-4" src="{{ asset('dakabita-logo.png') }}" alt="" width="72">
            </div>

            <form action="/login" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" autofocus required @error('email') is-invalid @enderror value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            </form>

            {{-- <small class="d-block text-center mt-4">Not Registered? <a href="/register">Register Now</a></small> --}}

        </main>
    </div>
</div>
@endsection
