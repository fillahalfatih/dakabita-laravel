@extends('layouts.third')

@section('container')
<div class="row justify-content-center align-item-center">
    <div class="col-lg-5">
        <main class="form-registration w-100 m-auto">

            <div class="d-flex justify-content-center">
                <img class="mb-4" src="{{ asset('dakabita-logo.png') }}" alt="" width="72">
            </div>

            <form action="/register" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>

                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
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

                <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            </form>

            <small class="d-block text-center mt-4">Already have an account? <a href="/login">Login Here!</a></small>

        </main>
    </div>
</div>
@endsection
